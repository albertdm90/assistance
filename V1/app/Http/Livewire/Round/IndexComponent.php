<?php

namespace App\Http\Livewire\Round;

use App\Models\Round;
use Livewire\Component;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $row = 20;

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
        ->orderBy('rounds.id', 'DESC')
        ->paginate($this->row);

        $rounds->map(function($round){
            $round->date = date('d/m/Y', strtotime($round->rou_date));
            $round->hour = date('h:i A', strtotime($round->rou_time));
            $round->register = date('d/m/Y h:i A', strtotime($round->created_at));
            $round->worker = "$round->wor_id_number - $round->wor_name $round->wor_lastname";
            $round->checkpoint = "$round->cp_description";
            switch ($round->rou_status) {
                case 0:
                    $round->status = '<div class="badge badge-pill badge-warning mb-1 float-right">Nuevo</div>';
                    break;
                case 1:
                    $round->status = '<div class="badge badge-pill badge-primary mb-1 float-right">Visto</div>';
                    break;
                case 2:
                    $round->status = '<div class="badge badge-pill badge-success mb-1 float-right">Verificado</div>';
                    break;
                case 3:
                    $round->status = '<div class="badge badge-pill badge-danger mb-1 float-right">Eliminado</div>';
                    break;
                
                default:
                    $round->status = '<div class="badge badge-pill badge-warning mb-1 float-right">Nuevo</div>';
                    break;
            }
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
