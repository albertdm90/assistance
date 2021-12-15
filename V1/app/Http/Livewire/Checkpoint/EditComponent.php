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
    $cp_id = '';

    protected $rules = [
        'cp_description' => 'required',
        'cp_status' => 'required',
        'cp_lat' => 'nullable|numeric|between:-90,90',
        'cp_long' => 'nullable|numeric|between:-90,90',
    ];

    protected $messages = [
        'required' => 'Requerido',
        'numeric' => 'Ingrese la coordenada correcta'
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
        $this->validate();

        $this->checkpoint->update([
            'cp_description' => $this->cp_description,
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
}
