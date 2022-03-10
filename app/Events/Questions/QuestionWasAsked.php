<?php

namespace App\Events\Questions;


use App\Entrepedia;
use Illuminate\Broadcasting\Channel;
use App\Http\Resources\EntrepediaResource;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class QuestionWasAsked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $entrepedia;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Entrepedia $entrepedia)
    {
        $this->entrepedia = $entrepedia;
    }

    public function broadcastWith()
    {
        return (new EntrepediaResource($this->entrepedia))->jsonSerialize();
    }

    public function broadcastAs()
    {
        return 'QuestionWasAsked';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->entrepedia->user->followers->map(function ($user)
        {
            return new PrivateChannel('question.' . $user->id);
        })->toArray();
    }

}
