<?php

namespace App\Http\Livewire\Worker;

use App\Models\Worker;
use Livewire\Component;

class UpdatePinComponent extends Component
{
    public $wor_pin = '', $wor_id = '';
    public function render()
    {
        $worker = Worker::find($this->wor_id);
        if(isset($worker->id)){
            $this->wor_pin = $worker->wor_pin;
        }
        return view('livewire.worker.update-pin-component');
    }

    public function update()
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $this->wor_pin = $randomString;

        $worker = Worker::find($this->wor_id);
        $worker->update([
            'wor_pin' => $this->wor_pin
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => 'Se ha guardado con éxito.'
            ]
        );
    }
}
