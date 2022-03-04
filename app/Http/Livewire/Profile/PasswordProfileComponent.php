<?php

namespace App\Http\Livewire\Profile;

use App\Http\Livewire\LivewireComponent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordProfileComponent extends LivewireComponent
{
    public $password_current = '', $password = '', $password_confirmation;

    protected $rules = [
        'password_current' => 'required|string|min:8',
        'password' => 'required|string|min:8|confirmed',
    ];

    protected $messages = [
        'required' => 'Requerido',
        'string' => 'Solo caracteres alfabeticos',
        'string' => 'Solo caracteres alfabeticos',
        'min' => 'Debe ingresar más de :min caracteres',
        'max' => 'Debe ingresar menos de :max caracteres',
        'confirmed' => 'Las contraseñas no son iguales',
    ];

    public function render()
    {
        return view('livewire.profile.password-profile-component');
    }

    public function update()
    {
        $this->validate();

        $hashedPassword = Auth::user()->password;
        if (Hash::check($this->password_current , $hashedPassword)) {
            if (!Hash::check($this->password , $hashedPassword)) {
                $users = User::find(Auth::user()->id);
                $users->update([
                    'password' => Hash::make($this->password)
                ]);
                $this->notification('Contraseña actualizada exitosamente', 'success');
            }
            else{
                $this->addError('password', 'La nueva contraseña no puede ser la contraseña anterior');
                $this->notification('¡La nueva contraseña no puede ser la contraseña anterior!', 'error');
            } 
        }
        else{
            $this->addError('password_current', 'La contraseña anterior no coincide');
            $this->notification('¡La contraseña anterior no coincide!', 'error');
        }
    }
}
