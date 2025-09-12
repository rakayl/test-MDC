<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PenyakitDalam;

class ListPenyakitDalam extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user_id;

    public function mount()
    {
        $this->user_id = auth()->id();
    }
    public function render()
    {
        $queues = PenyakitDalam::where('user_id', $this->user_id)
            ->orderBy('queue_date', 'desc')
            ->paginate(10);
        return view('livewire.customer.penyakit-dalam', [
            'queues' => $queues,
        ]);
    }
}
