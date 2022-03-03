<?php

namespace App\Http\Livewire\Checkpoint;

use App\Models\Checkpoint;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateComponent extends Component
{
    public $cp_description = '',
    $cp_status = 1,
    $cp_lat = '',
    $cp_long = '', 
    $cp_code = '';

    protected $listeners = ['showLatLong'];
    

    protected $rules = [
        'cp_description' => 'required',
        'cp_code' => 'required|unique:checkpoints,cp_code',
        'cp_lat' => 'nullable|numeric|between:-90,90',
        'cp_long' => 'nullable|numeric|between:-90,90',
        'cp_status' => 'required'
    ];

    protected $messages = [
        'required' => 'Requerido',
        'unique' => 'Ya esta registrado',
        'between' => 'Ingrese la coordenada correcta',
        'numeric' => 'Ingrese la coordenada correcta',
    ];

    public function render()
    {
        // $this->cp_code = Str::slug($this->cp_description, '_');
        return view('livewire.checkpoint.create-component');
    }

    public function store()
    {
        $this->validate();
        $checkpoint = Checkpoint::create([
            'cp_description' => $this->cp_description,
            'cp_code' => Str::lower($this->cp_code),
            'cp_lat' => $this->cp_lat,
            'cp_long' => $this->cp_long,
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

    public function getLocation()
    {
        $this->dispatchBrowserEvent(
            'getLocation'
        );
    }

    public function showLatLong($lat, $long)
    {
        $this->cp_lat = $lat;
        $this->cp_long = $long;
    }
}
