<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class LivewireComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $row = 20;

    protected $listeners = ['destroy'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updating($name, $value)
    {
        if($name == 'typeSearch'){
            $this->resetPage();
        }
    }

    public function paginationView()
    {
        return 'vendor.pagination.otika';
    }

    public function notification($message, $type)
    {
        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => $type, 
                'message' => $message
            ]
        );
    }

    public function error($message, $field)
    {
        session()->flash($field, $message);
    }
}
