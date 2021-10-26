<?php

namespace App\Http\Livewire\Worker;

use App\Models\Worker;
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
        $workers = Worker::where('wor_name', 'LIKE', "%{$this->search}%")
            ->orWhere('wor_lastname', 'LIKE', "%{$this->search}%")
            ->orWhere('wor_id_number', 'LIKE', "%{$this->search}%")
            ->orderBy('id', 'ASC')
            ->paginate($this->row);
        $status = 1;

        $workers->map(function($worker){
            $worker->date = date('d/m/Y', strtotime($worker->created_at));
            
        });

        foreach ($workers as $worker) {
            $status = $worker->wor_status == 1 ? 1 : 2;
        }

        return view('livewire.worker.index-component', [
            'workers' => $workers,
            'status' => $status
        ]);
    }

    public function destroy($id)
    {
        $worker = Worker::find($id);
            if(isset($worker->id))
            $worker->delete();
        
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'se ha eliminado el registro.']
        );
    }

    public function update($wor_status)
    {
        DB::table('workers')->update(['wor_status' => $wor_status]);

    }
}
