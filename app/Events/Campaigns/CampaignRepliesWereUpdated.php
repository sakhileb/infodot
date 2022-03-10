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

class CampaignRepliesWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $campaign;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->campaign->id,
            'count' => $this->campaign->replies->count(),
        ];
    }

    public function broadcastAs()
    {
        return 'CampaignRepliesWereUpdated';
    }

    public function broadcastOn()
    {
        return new Channel('campaigns');
    }
}
