<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
use Livewire\Component;

class CreateComponent extends Component
{
    public $pos_name = '',
        $pos_description = '';

    protected $rules = [
        'pos_name' => 'required|unique:positions,pos_name',
        'pos_description' => 'nullable'
    ];

    protected $messages = [
        'required' => 'Requerido',
        'unique' => 'Ya se encuentra registrado',
    ];
    
    public function render()
    {
        return view('livewire.position.create-component');
    }

    public function store()
    {
        $this->validate();

        $position = Position::create([
            'pos_name' => $this->pos_name,
            'pos_description' => $this->pos_description,
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );

        $this->dispatchBrowserEvent(
            'redirect', [
                'url' => route('position.edit', $position->id), 
            ]
        );
    }
}
