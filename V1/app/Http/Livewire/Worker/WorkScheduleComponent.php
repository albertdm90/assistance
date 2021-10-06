<?php

namespace App\Http\Livewire\Worker;

use App\Models\Checkpoint;
use App\Models\WorkSchedule;
use Livewire\Component;

class WorkScheduleComponent extends Component
{
    public $ws_id = '', $cp_id = '', $wor_id = '', $view = 'create', $ws_day = '', $ws_start_time = '', $ws_end_time = '';
    public $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
    
    protected $listeners = ['destroy'];

    protected $rules = [
        'cp_id' => 'required',
        'ws_day' => 'required',
        'ws_start_time' => 'required|date_format:H:i',
        'ws_end_time' => 'nullable|after_or_equal:ws_start_time|date_format:H:i',
    ];
    protected $messages = [
        'required' => 'Requerido',
        'date_format' => 'Formato inválido',
        'after_or_equal' => 'Debe ser igual o mayor a la hora de inicio',
    ];
    
    public function render()
    {
        $workSchedules = WorkSchedule::select(
            'work_schedules.*',
            'checkpoints.cp_description as checkpoint'
        )
        ->join('checkpoints','checkpoints.id','work_schedules.cp_id')
        ->join('workers','workers.id','work_schedules.wor_id')
        ->where('workers.id', $this->wor_id)
        ->orderBy('work_schedules.ws_day')
        ->get();

        $checkponits = Checkpoint::all(['id', 'cp_description']);

        $workSchedules->map(function($workSchedule){
            $workSchedule->hour = "Desde: $workSchedule->ws_start_time - Hasta: $workSchedule->ws_end_time";
            switch ($workSchedule->ws_day) {
                case 0:
                    $workSchedule->day = 'Lunes';
                    break;
                case 1:
                    $workSchedule->day = 'Martes';
                    break;
                case 2:
                    $workSchedule->day = 'Miercoles';
                    break;
                case 3:
                    $workSchedule->day = 'Jueves';
                    break;
                case 4:
                    $workSchedule->day = 'Viernes';
                    break;
                case 5:
                    $workSchedule->day = 'Sabado';
                    break;
                case 6:
                    $workSchedule->day = 'Domingo';
                    break;
                
                default:
                    $workSchedule->day = 'Error!';
                    break;
            }
        });

        return view('livewire.worker.work-schedule-component',[
            'checkpoints' => $checkponits,
            'workSchedules' => $workSchedules,
        ]);
    }

    public function default()
    {
        $this->view = 'create';
        $this->cp_id = '';
        $this->ws_day = '';
        $this->ws_start_time = '';
        $this->ws_end_time = '';
        $this->ws_id = '';
    }

    public function store()
    {
        $this->validate();

        $workSchedule = WorkSchedule::where('wor_id', $this->wor_id)
            ->where('cp_id', $this->cp_id)
            ->where('ws_day', $this->ws_day)
            ->whereTime('ws_start_time', '>=', $this->ws_start_time)
            ->whereTime('ws_end_time', '<=', $this->ws_end_time)
            ->count();
            
        if($workSchedule > 0){
            $this->dispatchBrowserEvent(
                'messageToastr', [
                    'type' => 'danger', 
                    'message' => 'El día esta y la hora ya esta asignada al empleado.'
                ]
            );
        }

        WorkSchedule::create([
            'wor_id' => $this->wor_id,
            'cp_id' => $this->cp_id,
            'ws_day' => $this->ws_day,
            'ws_start_time' => $this->ws_start_time,
            'ws_end_time' => $this->ws_end_time,
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );

        $this->default();
    }

    public function edit($id)
    {
        $workSchedule = WorkSchedule::find($id);
        if(isset($workSchedule->id))
        {
            $this->ws_id = $workSchedule->id;
            $this->cp_id = $workSchedule->cp_id;
            $this->ws_day = $workSchedule->ws_day;
            $this->ws_start_time = $workSchedule->ws_start_time;
            $this->ws_end_time = $workSchedule->ws_end_time;
            $this->view = 'edit';
        }
    }

    public function update()
    {
        $workSchedule = WorkSchedule::find($this->ws_id);
        $workSchedule->update([
            'cp_id' => $this->cp_id,
            'ws_day' => $this->ws_day,
            'ws_start_time' => $this->ws_start_time,
            'ws_end_time' => $this->ws_end_time,
        ]);
        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );
        $this->default();

    }

    public function destroy($id)
    {
        $workSchedule = WorkSchedule::find($id);
            if(isset($workSchedule->id))
            $workSchedule->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }

}
