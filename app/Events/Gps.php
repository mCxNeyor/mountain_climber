<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class Gps implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
      public float $lat;
      public float $lng;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($lat,$lng)
    {
        $this->lat= $lat;
        $this->lng= $lng;
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
        return 'Gps';
    }
}
