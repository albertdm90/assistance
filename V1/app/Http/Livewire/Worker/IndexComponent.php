<?php

namespace App\Http\Livewire\Worker;

use App\Models\Worker;
use Livewire\Component;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $row = 5;

    protected $listeners = ['destroy'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.pagination.otika';
    }

    public function render()
    {
        $workers = Worker::where('wor_name', 'LIKE', "%{$this->search}%")
        ->orWhere('wor_lastname', 'LIKE', "%{$this->search}%")
        ->orWhere('wor_id_number', 'LIKE', "%{$this->search}%")
        ->orderBy('id', 'ASC')
        ->paginate($this->row);

        $workers->map(function($position){
            $position->date = date('d/m/Y', strtotime($position->created_at));
        });

        return view('livewire.worker.index-component', [
            'workers' => $workers
        ]);
    }

    public function destroy($id)
    {
        $worker = Worker::find($id);
            if(isset($worker->id))
            $worker->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }
}
