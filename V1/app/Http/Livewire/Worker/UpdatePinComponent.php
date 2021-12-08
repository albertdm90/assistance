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
        $status = false;
        while ($status == false) {
            $this->wor_pin = str_pad(mt_Rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $worker_count = Worker::where('wor_pin', $this->wor_pin)->count();
            $status = $worker_count == 0 ? true : false;
        }

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
