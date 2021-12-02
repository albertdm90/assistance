<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
use Livewire\Component;

class EditComponent extends Component
{
    public $pos_id = '',
        $position,
        $pos_name = '',
        $pos_description = '';

    protected $messages = [
        'required' => 'Requerido',
        'unique' => 'Ya se encuentra registrado',
    ];

    public function mount()
    {
        $this->position = Position::find($this->pos_id);
        if(isset($this->position->id)){
            $this->pos_name = $this->position->pos_name;
            $this->pos_description = $this->position->pos_description;
        }
    }
    
    public function render()
    {
        return view('livewire.position.edit-component');
    }

    public function store()
    {
        $this->validate([
            'pos_name' => 'required|unique:positions,pos_name,'.$this->pos_id,
            'pos_description' => 'nullable'
        ]);

        $this->position->update([
            'pos_name' => $this->pos_name,
            'pos_description' => $this->pos_description,
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );
    }
}
