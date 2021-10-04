<?php

namespace App\Http\Livewire\Worker;

use App\Models\Position;
use App\Models\Worker;
use Livewire\Component;

class CreateComponent extends Component
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
    $pos_id = '';

    protected $rules = [
        'wor_nacionality' => 'required',
        'wor_id_number' => 'required|numeric|unique:workers,wor_id_number',
        'wor_name' => 'required',
        'wor_lastname' => 'required',
        'wor_email' => 'required|email',
        'wor_home_address' => 'nullable',
        'wor_type_contract' => 'nullable',
        'pos_id' => 'required',
    ];

    protected $messages = [
        'required' => 'Requerido',
        'numeric' => 'Solo caracteres numericos',
        'email' => 'Solo en formato de correo electrónico',
        'unique' => 'Ya se encuentra registrado',
    ];

    public function render()
    {
        $positions = Position::all();
        return view('livewire.worker.create-component',[
            'positions' => $positions
        ]);
    }

    public function store()
    {
        $this->validate();

        $worker = Worker::create([
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

        $this->dispatchBrowserEvent(
            'redirect', [
                'url' => route('worker.show', $worker->id), 
            ]
        );
    }
}
