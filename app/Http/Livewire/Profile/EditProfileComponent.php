<?php

namespace App\Http\Livewire\Profile;

use App\Http\Livewire\LivewireComponent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditProfileComponent extends LivewireComponent
{
    public $name = '', $email = '';

    protected $rules = [
        'name' => 'required|min:4|max:20',
        'email' => 'required|email|min:4|max:30'
    ];

    protected $messages = [
        'required' => 'Requerido',
        'email' => 'Solo formato de correo electrónico',
        'min' => 'Debe ingresar más de :min caracteres',
        'max' => 'Debe ingresar menos de :max caracteres',
    ];

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }
    public function render()
    {
        return view('livewire.profile.edit-profile-component');
    }

    public function update()
    {
        $this->validate();

        $user = User::find(Auth::user()->id);
        
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->notification('Se ha actualizo el perfil', 'success');
    }
}
