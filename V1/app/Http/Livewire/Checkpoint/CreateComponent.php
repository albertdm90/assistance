<?php

namespace App\Http\Livewire\Checkpoint;

use App\Models\Checkpoint;
use Livewire\Component;

class CreateComponent extends Component
{
    public $cp_description = '',
    $cp_status = 1,
    $cp_lat = '',
    $cp_long = '', 
    $cp_code = '';

    protected $rules = [
        'cp_description' => 'required',
        'cp_code' => 'required|unique:checkpoints,cp_code',
        'cp_status' => 'required'
    ];

    protected $messages = [
        'required' => 'Requerido',
        'unique' => 'Ya esta registrado',
    ];

    public function mount()
    {
        $this->cp_code = md5(date('YmdHmis'));
    }

    public function render()
    {
        return view('livewire.checkpoint.create-component');
    }

    public function store()
    {
        $this->validate();

        $checkpoint = Checkpoint::create([
            'cp_description' => $this->cp_description,
            'cp_code' => $this->cp_code,
            'cp_status' => $this->cp_status,
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );

        $this->dispatchBrowserEvent(
            'redirect', [
                'url' => route('checkpoint.edit', $checkpoint->id), 
            ]
        );
    }
}
