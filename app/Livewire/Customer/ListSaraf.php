<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Saraf;

class ListSaraf extends Component
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
        $queues = Saraf::where('user_id', $this->user_id)
            ->orderBy('queue_date', 'desc')
            ->paginate(10);
        return view('livewire.customer.saraf', [
            'queues' => $queues,
        ]);
    }
}
