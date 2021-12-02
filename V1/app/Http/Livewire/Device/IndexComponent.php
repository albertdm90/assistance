<?php

namespace App\Http\Livewire\Device;

use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $row = 5;

    protected $listeners = ['destroy'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.pagination.otika';
    }

    public function render()
    {
        $devices = Device::where('cod_uuid', 'LIKE', "%{$this->search}%")
        ->orderBy('cod_uuid', 'ASC')
        ->paginate($this->row);

        $devices->map(function($device){
            $device->date = date('d/m/Y', strtotime($device->created_at));
        });

        return view('livewire.device.index-component', [
            'devices' => $devices
        ]);
    }

    public function destroy($id)
    {
        $device = Device::find($id);
            if(isset($device->id))
            $device->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }

    public function destroyAll()
    {
        DB::table('devices')
            ->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado los registros.']
        );
    }

    


}
