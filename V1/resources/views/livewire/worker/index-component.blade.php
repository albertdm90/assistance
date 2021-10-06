<div class="card card-primary">
    <div class="card-header">
        <h4>Trabajadores</h4>
        <div class="card-header-action">
          <a href="{{ route('worker.create') }}" class="btn btn-primary btn-icon icon-right">Crear <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
    @if (isset($search) && isset($row))
      <div class="card-header text-right " style="display: block;">
          @include('livewire.includes.barSearch')
      </div>
      @endif

    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr class="primary">
              <th scope="col">#</th>
              <th scope="col">Empleado</th>
              <th scope="col">Fecha de creación</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($workers as $key => $worker)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td><a href="{{ route('worker.show', $worker->id) }}">{{ $worker->wor_id_number.' - '.$worker->wor_name .' '. $worker->wor_lastname }}</a></td>
                <td>{{ $worker->date }}</td>
                <td width="100px">
                  <a class="btn btn-icon btn-primary btn-action mr-1" href="{{ route('worker.edit', $worker->id) }}"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $worker->id }}, 'worker.index-component', 'destroy')"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center text-muted">Sin registro</td>
              </tr>
            @endforelse

           
            
          </tbody>
        </table>
      </div>

      {{ $workers->links() }}
    </div>
</div>