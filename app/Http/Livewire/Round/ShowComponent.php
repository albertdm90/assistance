<?php

namespace App\Http\Livewire\Round;

use App\Models\Round;
use App\Models\Worker;
use App\Models\WorkSchedule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowComponent extends Component
{
    use WithPagination;

    public $rou_id = '';
    public $row = 10;
    public $route = '';

    protected $listeners = ['deleteAll'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.pagination.otika';
    }

    public function mount() {
        $this->route = url()->previous();
    }
    
    public function render()
    {
        $round = $this->getRound();
        $worker = $this->getWorker($round->wor_id);
        $schedules = $this->getSchedule($round->wor_id);
        $rounds = $this->getRounds($round->wor_id);

        return view('livewire.round.show-component', [
            'round' => $round,
            'worker' => $worker,
            'rounds' => $rounds,
            'schedules' => $schedules,
        ]);
    }

    public function getRound()
    {
        $round = Round::select('rounds.*', 
            'checkpoints.cp_description', 
            'checkpoints.cp_lat', 
            'checkpoints.cp_long', 
        )->join('workers', 'workers.id', 'rounds.wor_id')
        ->join('checkpoints', 'checkpoints.id', 'rounds.cp_id')
        ->where('rounds.id', $this->rou_id)
        ->first();


        $round->date = date('d-m-Y', strtotime($round->rou_date));
        $round->hour = date('h:i A', strtotime($round->rou_time));

        $round->status = $round->rou_status == 0 
            ? '<span class=""><i class="fas fa-times text-danger"></i>&nbsp;La ronda no se realizó dentro del horario</span>'
            : '<span class="text-black"><i class="fas fa-check text-success"></i> La ronda se realizó dentro del horario</span>';

            $msjDdistance = '<span class="text-muted"><i class="fas fa-times text-danger"></i>&nbsp;&nbsp;No existe un registro de geolocalización</span>';

            if($round->rou_lat != '' && $round->cp_lat != ''){
                $distance = $this->calculateDistance($round->rou_lat, $round->rou_long, $round->cp_lat, $round->cp_long, 'K');
                if($distance > 30){
                    $msjDdistance = '<span class=""><i class="fas fa-times text-danger"></i>&nbsp;&nbsp;Se realizó a una distancia de '.$distance.' m del punto de control</span>';
                }else
                {
                    $msjDdistance = '<span class=""><i class="fas fa-check text-danger"></i>&nbsp;Se realizó a una distancia de '.$distance.' m. del punto de control</span>';
                }
            }
        $round->distance = $msjDdistance;

        return $round;
    }

    public function getWorker($wor_id)
    {
        return Worker::find($wor_id);
    }

    public function getRounds($wor_id)
    {
        $rounds = Round::select('rounds.*', 
            'checkpoints.cp_description', 
            'checkpoints.cp_lat',
            'checkpoints.cp_long',
        )->join('workers', 'workers.id', 'rounds.wor_id')
        ->join('checkpoints', 'checkpoints.id', 'rounds.cp_id')
        ->where('workers.id', $wor_id)
        ->orderBy('rounds.rou_date', 'DESC')
        ->orderBy('rounds.rou_time', 'DESC')
        ->paginate($this->row);

        $rounds->map(function($round){
            $round->date = date('d-m-Y', strtotime($round->rou_date));
            $round->hour = date('h:i A', strtotime($round->rou_time));

            $round->status = $round->rou_status == 0 
            ? '<span class="badge badge-warning badge-pill float-right"><i class="fas fa-times"></i></span>'
            : '<span class="badge badge-success badge-pill float-right"><i class="fas fa-check"></i></span>';
        });

        return $rounds;
    }

    public function show($id)
    {
        $this->rou_id = $id;
    }

    public function getSchedule($id)
    {
        $schedules = WorkSchedule::where('wor_id', $id)->orderBy('ws_day', 'ASC')->orderBy('ws_start_time', 'ASC')->get();
        $schedules->map(function($schedule){
            $ws_start_time = date('h:i A', strtotime($schedule->ws_start_time));
            $ws_end_time = date('h:i A', strtotime($schedule->ws_end_time));
            $schedule->hour = "Desde: $ws_start_time - Hasta: $ws_end_time";

            switch ($schedule->ws_day) {
                case 0:
                    $schedule->day = 'Lunes';
                    break;
                case 1:
                    $schedule->day = 'Martes';
                    break;
                case 2:
                    $schedule->day = 'Miercoles';
                    break;
                case 3:
                    $schedule->day = 'Jueves';
                    break;
                case 4:
                    $schedule->day = 'Viernes';
                    break;
                case 5:
                    $schedule->day = 'Sabado';
                    break;
                case 6:
                    $schedule->day = 'Domingo';
                    break;
                
                default:
                    $schedule->day = 'Error!';
                    break;
            }
        });
        return $schedules;
    }

    public function goBack()
    {
        return redirect($this->route);
    }

    public function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return round(($miles * 1.609344) * 1000, 2) ;   
    }
}
