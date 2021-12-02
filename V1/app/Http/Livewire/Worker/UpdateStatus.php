<?php

namespace App\Http\Livewire\Worker;

use App\Models\Worker;
use Livewire\Component;

class UpdateStatus extends Component
{
    public $wor_id = '';

    public function render()
    {
        $worker = Worker::find($this->wor_id);
        $status = $worker->wor_status;
        return view('livewire.worker.update-status',[
            'wor_status' => $status
        ]);
    }

    public function update($status)
    {
        $message = $status == 1 ? 'Empleado activo.' : 'Empleado actualizado.';
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
