<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pendaftaran;
use App\Events\QueueUpdated;

class PendaftaranForm extends Component
{
    public $queueNumber;

    public function takeQueue()
    {
        $lastNumber = Pendaftaran::whereDate('queue_date', today())->max('number');

        $nextNumber = $lastNumber ? $lastNumber + 1 : 1;
        
        // Simpan antrian
        $queue = Pendaftaran::create([
            'queue_date'=>today(),
            'number'=>$nextNumber,
            'no_queue'=>'P'.$nextNumber,
            'status'     => 'waiting',
        ]);

        $this->queueNumber = $queue->no_queue;
    }

    public function render()
    {
        
        return view('livewire.pendaftaran-form');
    }
}
