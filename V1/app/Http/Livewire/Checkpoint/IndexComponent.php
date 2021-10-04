<?php

namespace App\Http\Livewire\Checkpoint;

use App\Models\Checkpoint;
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
        $checkpoints = Checkpoint::where('cp_description', 'LIKE', "%{$this->search}%")
        ->orderBy('cp_description', 'ASC')
        ->paginate($this->row);

        $checkpoints->map(function($checkpoint){
            $checkpoint->date = date('d/m/Y', strtotime($checkpoint->created_at));
        });

        return view('livewire.checkpoint.index-component',[
            'checkpoints' => $checkpoints
        ]);
    }

    public function destroy($id)
    {
        $checkpoint = Checkpoint::find($id);
            if(isset($checkpoint->id))
            $checkpoint->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }
}
