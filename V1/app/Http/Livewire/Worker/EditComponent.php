<?php

namespace App\Http\Livewire\Worker;

use App\Models\Position;
use App\Models\Worker;
use Livewire\Component;

class EditComponent extends Component
{
    public 
    $wor_nacionality = '',
    $wor_id_number = '',
    $wor_name = '',
    $wor_lastname = '',
    $wor_email = '',
    $wor_home_address = '',
    $wor_type_contract = '',
    $wor_status = '',
    $wor_pin = '',
    $wor_location = '',
    $pos_id = '',
    $wor_id = '',
    $worker;

    protected $messages = [
        'required' => 'Requerido',
        'numeric' => 'Solo caracteres numericos',
        'email' => 'Solo en formato de correo electrónico',
        'unique' => 'Ya se encuentra registrado',
    ];

    public function mount()
    {
        $this->worker = Worker::find($this->wor_id);
        if(isset($this->worker->id)){
            $this->wor_nacionality = $this->worker->wor_nacionality;
            $this->wor_id_number = $this->worker->wor_id_number;
            $this->wor_name = $this->worker->wor_name;
            $this->wor_lastname = $this->worker->wor_lastname;
            $this->wor_email = $this->worker->wor_email;
            $this->wor_home_address = $this->worker->wor_home_address;
            $this->wor_type_contract = $this->worker->wor_type_contract;
            $this->wor_status = $this->worker->wor_status;
            $this->wor_pin = $this->worker->wor_pin;
            $this->wor_location = $this->worker->wor_location;
            $this->pos_id = $this->worker->pos_id;
        }
    }

    public function render()
    {
        $positions = Position::all();
        return view('livewire.worker.edit-component',[
            'positions' => $positions
        ]);
    }

    public function update()
    {
        $this->validate([
            'wor_nacionality' => 'required',
            'wor_id_number' => 'required|numeric|unique:workers,wor_id_number,'.$this->wor_id,
            'wor_name' => 'required',
            'wor_lastname' => 'required',
            'wor_email' => 'required|email',
            'wor_home_address' => 'nullable',
            'wor_type_contract' => 'nullable',
            'pos_id' => 'required',
        ]);

        $this->worker->update([
            'wor_nacionality' => $this->wor_nacionality,
            'wor_id_number' => $this->wor_id_number,
            'wor_name' => $this->wor_name,
            'wor_lastname' => $this->wor_lastname,
            'wor_email' => $this->wor_email,
            'wor_home_address' => $this->wor_home_address,
            'wor_type_contract' => $this->wor_type_contract,
            'pos_id' => $this->pos_id,
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );

    }
}
