<?php

namespace App\Http\Livewire\Checkpoint;

use App\Models\Checkpoint;
use Livewire\Component;

class EditComponent extends Component
{
    public $cp_description = '',
    $cp_status = '',
    $cp_lat = '',
    $cp_long = '',
    $cp_code = '',
    $cp_id = 0;

    protected $listeners = ['showLatLong'];

    protected $messages = [
        'required' => 'Requerido',
        'numeric' => 'Ingrese la coordenada correcta',
        'unique' => 'Ya esta registrado',
    ];

    public function mount()
    {
        $this->checkpoint = Checkpoint::find($this->cp_id);
        if(isset($this->checkpoint->id)){
            $this->cp_description = $this->checkpoint->cp_description;
            $this->cp_status = $this->checkpoint->cp_status;
            $this->cp_code = $this->checkpoint->cp_code;
            $this->cp_lat = $this->checkpoint->cp_lat;
            $this->cp_long = $this->checkpoint->cp_long;
        }
    }

    public function render()
    {
        return view('livewire.checkpoint.edit-component');
    }

    public function update()
    {
        $this->validate([
            'cp_description' => 'required',
            'cp_code' => 'required|unique:checkpoints,cp_code,'.$this->cp_id,
            'cp_status' => 'required',
            'cp_lat' => 'nullable|numeric|between:-90,90',
            'cp_long' => 'nullable|numeric|between:-90,90',
        ]);

        $this->checkpoint->update([
            'cp_description' => $this->cp_description,
            'cp_code' => $this->cp_code,
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
