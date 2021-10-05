<?php

namespace App\Http\Livewire\Round;

use App\Models\Round;
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
        $rounds = Round::select('rounds.*', 
            'workers.wor_name', 
            'workers.wor_lastname', 
            'workers.wor_id_number', 
            'checkpoints.cp_description', 
        )->join('workers', 'workers.id', 'rounds.wor_id')
        ->join('checkpoints', 'checkpoints.id', 'rounds.cp_id')
        ->where('workers.wor_name', 'LIKE', "%{$this->search}%")
        ->orWhere('workers.wor_lastname', 'LIKE', "%{$this->search}%")
        ->orWhere('workers.wor_id_number', 'LIKE', "%{$this->search}%")
        ->orderBy('rounds.created_at', 'ASC')
        ->paginate($this->row);

        $rounds->map(function($round){
            $round->date = date('d/m/Y H:i', strtotime($round->created_at));
            $round->worker = "$round->wor_id_number - $round->wor_name $round->wor_lastname";
            $round->checkpoint = "$round->cp_description";
        });

        return view('livewire.round.index-component',[
            'rounds' => $rounds
        ]);
    }

    public function destroy($id)
    {
        $round = Round::find($id);
            if(isset($round->id))
            $round->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }

}
