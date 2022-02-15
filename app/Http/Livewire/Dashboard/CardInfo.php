<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Checkpoint;
use App\Models\Round;
use App\Models\Worker;
use Livewire\Component;

class CardInfo extends Component
{
    public $type = '';

    public function render()
    {
        $title = '';
        $img = '';
        $note = '';
        $data = 00;

        switch ($this->type) {
            case 'chechkpoint':
                $result = $this->checkpointsCount();
                $title = 'Puntos';
                $img = 'assets/img/banner/4.png';
                $note = '<p class="mb-0"><span class="col-green">'.$result['active'].'%</span> Activo</p>';
                $data = $result['total'];
                break;

            case 'worker':
                $result = $this->workersCount();
                $title = 'Empleado';
                $img = 'assets/img/banner/1.png';
                $note = '<p class="mb-0"><span class="col-green">'.$result['active'].'%</span> Activo</p>';
                $data = $result['total'];
                break;

            case 'round':
                $result = $this->roundsCount();
                $title = 'Rondas registradas';
                $img = 'assets/img/banner/3.png';
                // $note = '<p class="mb-0"><span class="col-green">'.$result['active'].'%</span> Activo</p>';
                $data = $result['total'];
                break;
            
            default:
                # code...
                break;
        }
        return view('livewire.dashboard.card-info', [
            'title' => $title,
            'img' => $img,
            'note' => $note,
            'data' => $data,
        ]);

    }

    public function checkpointsCount()
    {
        $data['total'] = Checkpoint::count();
        $data['active'] = 0;
        if($data['total'] > 0){
            $active = Checkpoint::where('cp_status', 1)->count();
            $data['active'] = $active*100/$data['total'];
            $data['active'] = round($data['active'], 2);
        }
        return $data;
    }

    public function workersCount()
    {
        $data['total'] = Worker::count();
        $active = Worker::where('wor_status', 1)->count();
        $data['active'] = 0;
        if( $data['total'] > 0){
            $data['active'] = $active*100/$data['total'];
            $data['active'] = round($data['active'], 2);
        }
        return $data;
    }

    public function roundsCount()
    {
        $data['total'] = Round::count();
        return $data;
    }
}
