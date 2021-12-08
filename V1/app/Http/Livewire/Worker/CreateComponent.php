<?php

namespace App\Http\Livewire\Worker;

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
    $wor_location = '';

    protected $rules = [
        'wor_nacionality' => 'required',
        'wor_id_number' => 'required|numeric|unique:workers,wor_id_number',
        'wor_pin' => 'required|digits:6|numeric|unique:workers,wor_pin',
        'wor_name' => 'required',
        'wor_lastname' => 'required',
        'wor_email' => 'required|email',
        'wor_home_address' => 'nullable',
        'wor_type_contract' => 'nullable',
    ];

    protected $messages = [
        'required' => 'Requerido',
        'numeric' => 'Solo caracteres numericos',
        'email' => 'Solo en formato de correo electrónico',
        'unique' => 'Ya se encuentra registrado',
        'digits' => 'Debe tener 6 Dígitos',
    ];

    public function mount()
    {
        $status = false;
        // $this->wor_pin = random_int(0, 999999);

        while ($status == false) {
            $this->wor_pin = str_pad(mt_Rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $worker_count = Worker::where('wor_pin', $this->wor_pin)->count();
            $status = $worker_count == 0 ? true : false;
        }

    }

    public function render()
    {
        
        return view('livewire.worker.create-component', );
    }

    public function store()
    {
        $this->validate();     

        $worker = Worker::create([
            'wor_nacionality' => $this->wor_nacionality,
            'wor_id_number' => $this->wor_id_number,
            'wor_pin' => $this->wor_pin,
            'wor_name' => $this->wor_name,
            'wor_lastname' => $this->wor_lastname,
            'wor_email' => $this->wor_email,
            'wor_home_address' => $this->wor_home_address,
            'wor_type_contract' => $this->wor_type_contract,
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
