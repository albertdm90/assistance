<?php

namespace App\Http\Livewire\Worker;

use App\Models\Round;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RoundComponent extends Component
{
    use WithPagination;

    public $wor_id = '';
    public $rounds_id = [];
    public $row = 20;

    protected $listeners = ['deleteAll'];

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
                'checkpoints.cp_description', 
            )->join('workers', 'workers.id', 'rounds.wor_id')
            ->join('checkpoints', 'checkpoints.id', 'rounds.cp_id')
            ->where('workers.id', $this->wor_id)
            ->orderBy('rounds.rou_date', 'DESC')
            ->orderBy('rounds.rou_time', 'DESC')
            ->paginate($this->row);

        $rounds->map(function($round){
            $round->date = date('d-m-Y', strtotime($round->rou_date));
            $round->hour = date('h:i A', strtotime($round->rou_time));

            $round->status = $round->rou_status == 0 
            ? '<button class="btn btn-icon btn-warning btn-sm float-right" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Registro fuera del horario del empleado" data-original-title="Atención"><i class="fas fa-times"></i></button>'
            : '<button class="btn btn-icon btn-success btn-sm float-right" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Registro creado en horario del empleado" data-original-title="Atención"><i class="fas fa-check"></i></button>';
        });
       
        return view('livewire.worker.round-component', [
            'rounds' => $rounds
        ]);
    }

    public function update($id)
    {
        $round = Round::find($id);
        if($round->wor_id == $this->wor_id)
        {
            $round->update([
                'rou_status' => 2
            ]);
        }
    }

    public function updateAll($status)
    {
        foreach ($this->rounds_id as $id) {
            if($id) DB::table('rounds')
            ->where('wor_id', $this->wor_id)
            ->where('id', $id)
            ->update(['rou_status' => $status]);
        }
    }

    public function deleteAll()
    {
        foreach ($this->rounds_id as $id) {
            if($id) DB::table('rounds')
            ->where('wor_id', $this->wor_id)
            ->where('id', $id)
            ->delete();    
        }

        DB::table('rounds')
        ->where('wor_id', $this->wor_id)
        ->where('rou_status', 3)
        ->delete();
    }
}
