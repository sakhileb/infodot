<?php

namespace App\Events\Campaigns;

use App\User;
use App\Campaign;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CampaignRecampaignsWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;
    protected $campaign;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Campaign $campaign)
    {
        $this->user = $user;
        $this->campaign = $campaign;
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->campaign->id,
            'user_id' => $this->user->id,
            'count' => $this->campaign->recampaign->count(),
        ];
    }

    public function broadcastAs()
    {
        return 'CampaignRecampaignsWereUpdated';
    }

    public function broadcastOn()
    {
        return new Channel('campaigns');
    }
}
