<?php

namespace App\Http\Livewire\Worker;

use App\Models\Worker;
use Livewire\Component;

class UpdateFingerprint extends Component
{
    public $wor_id = '';

    public function render()
    {
        $worker = Worker::find($this->wor_id);
        $status = $worker->wor_status;
        return view('livewire.worker.update-fingerprint',[
            'wor_status' => $status
        ]);
    }

    public function update($status)
    {
        $message = $status == 1 ? 'Cancelado.' : 'Se espera confimación de la app móvil.';
        $worker = Worker::find($this->wor_id);
        $worker->update([
            'wor_status' => $status
        ]);

        $this->dispatchBrowserEvent(
            'messageToastr', [
                'type' => 'success', 
                'message' => $message
            ]
        );

    }
}
