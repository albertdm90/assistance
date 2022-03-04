<?php

namespace App\Http\Livewire\Round;

use App\Models\Round;
use App\Http\Livewire\LivewireComponent;

class IndexComponent extends LivewireComponent
{
    public $typeSearch = 'month';
    public $date_start = '';
    public $date_end = '';
    public $status = '';

    public function mount()
    {
        $this->date_start = date('Y-m-d');
        $this->date_end = date('Y-m-d');
    }

    public function render()
    {
        $rounds = Round::select('rounds.*', 
            'workers.wor_name', 
            'workers.wor_lastname', 
            'workers.wor_id_number', 
            'checkpoints.cp_description', 
            'checkpoints.cp_lat', 
            'checkpoints.cp_long', 
        )->join('workers', 'workers.id', 'rounds.wor_id')
        ->join('checkpoints', 'checkpoints.id', 'rounds.cp_id')
        // ->where('workers.wor_name', 'LIKE', "%{$this->search}%")
        // ->orWhere('workers.wor_lastname', 'LIKE', "%{$this->search}%")
        // ->orWhere('workers.wor_id_number', 'LIKE', "%{$this->search}%")
        ->when([
            'typeSearch' => $this->typeSearch,
            'dateStart' => $this->date_start, 
            'dateEnd' => $this->date_end
        ], function ($query, $data) {

            if($data['typeSearch'] == 'today'){
                return $query->whereDate('rounds.rou_date', now());
            }
            if($data['typeSearch'] == 'month'){
                return $query->whereMonth('rounds.rou_date', now());
            }
            if($data['typeSearch'] == 'last-month'){
                $today = date("d-m-Y");
                $month = date("m",strtotime($today."- 1 month"));
                $year = date("Y",strtotime($today."- 1 month"));
                return $query->whereYear('rounds.rou_date', $year)->whereMonth('rounds.rou_date', $month);
            }
            if($data['typeSearch'] == 'year'){
                return $query->whereYear('rounds.rou_date', now());
            }
            if($data['typeSearch'] == 'date'){
                return $query->whereBetween('rounds.rou_date', [
                    $data['dateStart'],
                    $data['dateEnd'],
                ]);
            }
        })
        ->when($this->search, function ($query, $type_search) {
            return $query->where('workers.wor_id_number', 'LIKE', "%{$this->search}%")
                ->orWhere('workers.wor_name', 'LIKE', "%{$this->search}%")
                ->orWhere('workers.wor_lastname', 'LIKE', "%{$this->search}%");
        })
        ->when($this->status, function ($query, $status) {
            if($status == 1) {
                return $query->where('rounds.rou_status', '>', 0);
            }else{
                return $query->where('rounds.rou_status', 0);
            }
        })
        ->orderBy('rounds.id', 'DESC')
        ->paginate($this->row);

        $rounds->map(function($round){
            $round->date = date('d/m/Y', strtotime($round->rou_date));
            $round->hour = date('h:i A', strtotime($round->rou_time));
            $round->register = date('d/m/Y h:i A', strtotime($round->created_at));
            $round->worker = "$round->wor_id_number - $round->wor_name $round->wor_lastname";
            $round->checkpoint = "$round->cp_description";
            $round->status = $round->rou_status == 0 
            ? '<span class=""><i class="fas fa-times text-danger"></i>&nbsp;&nbsp;Ronda realizada fuera del horario</span>'
            : '<span class=""><i class="fas fa-check text-success"></i>&nbsp;Ronda realizada dentro del horario</span>';

            $msjDdistance = '<span class="text-muted"><i class="fas fa-times text-danger"></i>&nbsp;&nbsp;No existe un registro de geolocalización</span>';

            if($round->rou_lat != '' && $round->cp_lat != ''){
                $distance = $this->calculateDistance($round->rou_lat, $round->rou_long, $round->cp_lat, $round->cp_long, 'K');
                if($distance > 100){ 
                    $msjDdistance = '<span class=" "><i class="fas fa-times text-danger"></i>&nbsp;&nbsp;Se realizó a una distancia de '.$distance.' m del punto de control.</span>';
                }else
                {
                    $msjDdistance = '<span class=" "><i class="fas fa-check text-danger"></i>&nbsp;Se realizó a una distancia de '.$distance.' m. del punto de control.</span>';
                }
            }
            $round->distance = $msjDdistance;
        });
        return view('livewire.round.index-component',[
            'rounds' => $rounds
        ]);
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
