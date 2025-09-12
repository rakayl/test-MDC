<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;

class QueueUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $queue;

    public function __construct($queue)
    {
        $this->queue = $queue;
    }

    public function broadcastOn()
    {
        return new Channel('queue-channel');
    }

    public function broadcastAs()
    {
        return 'queue.active';
    }
}
