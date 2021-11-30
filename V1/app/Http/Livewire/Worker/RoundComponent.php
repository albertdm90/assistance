<?php

namespace App\Http\Livewire\Worker;

use App\Models\Round;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RoundComponent extends Component
{
    public $wor_id = '';
    public $rounds_id = [];

    protected $listeners = ['deleteAll'];

    public function render()
    {
        $rounds = Round::select('rounds.*', 
                'checkpoints.cp_description', 
            )->join('workers', 'workers.id', 'rounds.wor_id')
            ->join('checkpoints', 'checkpoints.id', 'rounds.cp_id')
            ->where('workers.id', $this->wor_id)
            ->orderBy('rounds.created_at', 'ASC')
            ->get();

        $rounds->map(function($round){
            $round->date = date('d-m-Y', strtotime($round->rou_date));
            $round->hour = date('h:i A', strtotime($round->rou_time));
            $round->status = '<div class="badge badge-pill badge-warning mb-1 float-right">Nuevo</div>';
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

        DB::table('rounds')
            ->where('rou_status', 0)
            ->where('wor_id', $this->wor_id)
            ->update(['rou_status' => 1]);
       
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
