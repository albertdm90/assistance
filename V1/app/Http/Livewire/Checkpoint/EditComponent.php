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
    $cp_id = '';

    protected $rules = [
        'cp_description' => 'required',
        'cp_status' => 'required',
    ];

    protected $messages = [
        'required' => 'Requerido'
    ];

    public function mount()
    {
        $this->checkpoint = Checkpoint::find($this->cp_id);
        if(isset($this->checkpoint->id)){
            $this->cp_description = $this->checkpoint->cp_description;
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
                'url' => route('checkpoint.edit', $this->checkpoint->id), 
            ]
        );
    }
}
