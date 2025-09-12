<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ticket;

class MonitorQueue extends Component
{
    public function render()
    {
          $activeQueue = Ticket::with(['tiketable'])
            ->whereDate('queue_date', today())
            ->latest('updated_at')
            ->first();
          $queue = Ticket::with(['tiketable'])
            ->whereDate('queue_date', today())
            ->get();
        return view('livewire.monitor-queue',compact('activeQueue','queue'));
    }
}
