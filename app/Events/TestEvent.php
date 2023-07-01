<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public float $latitude;
    public float $longitude;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($latitude,$longitude)
    {
        $this->latitude= $latitude;
        $this->longitude= $longitude;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new channel('monitor');
//        return 'monitor';
    }

    public function broadcastAs()
    {
        return 'TestEvent';
    }
}
