<?php

namespace App\Events\Campaigns;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Campaign;
use App\Http\Resources\CampaignResource;

class CampaignWasCreated implements ShouldBroadcast
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
        return (new CampaignResource($this->campaign))->jsonSerialize();
    }

    public function broadcastAs()
    {
        return 'CampaignWasCreated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->campaign->user->followers->map(function ($user)
        {
            return new PrivateChannel('timeline.' . $user->id);
        })->toArray();
    }

}
