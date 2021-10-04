<?php

namespace App\Http\Livewire\Worker;

use App\Models\Worker;
use Livewire\Component;

class ShowComponent extends Component
{
    public $wor_nacionality = '',
    $wor_id_number = '',
    $wor_name = '',
    $wor_lastname = '',
    $wor_email = '',
    $wor_home_address = '',
    $wor_type_contract = '',
    $wor_status = '',
    $wor_pin = '',
    $wor_location = '',
    $pos_id = '',
    $wor_id = '',
    $pos_name = '';

    public function render()
    {
        $worker = Worker::find($this->wor_id);
        if(isset($worker->id)){
            $this->wor_nacionality = $worker->wor_nacionality;
            $this->wor_id_number = $worker->wor_id_number;
            $this->wor_name = $worker->wor_name;
            $this->wor_lastname = $worker->wor_lastname;
            $this->wor_email = $worker->wor_email;
            $this->wor_home_address = $worker->wor_home_address;
            $this->wor_type_contract = $worker->wor_type_contract;
            $this->wor_status = $worker->wor_status;
            $this->wor_pin = $worker->wor_pin;
            $this->wor_location = $worker->wor_location;
            $this->pos_name = $worker->position->pos_name;
        }
        return view('livewire.worker.show-component');
    }

    public function updatePin()
    {
        // $this->wor_pin=rand();
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
