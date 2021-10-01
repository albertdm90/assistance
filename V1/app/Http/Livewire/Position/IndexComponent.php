<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
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
        $positions = Position::where('pos_name', 'LIKE', "%{$this->search}%")
        ->orderBy('pos_name', 'ASC')
        ->paginate($this->row);

        $positions->map(function($position){
            $position->date = date('d/m/Y', strtotime($position->created_at));
        });

        return view('livewire.position.index-component', [
            'positions' => $positions
        ]);
    }

    public function destroy($id)
    {
        $position = Position::find($id);
            if(isset($position->id))
            $position->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }
}
