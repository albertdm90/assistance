<div class="card card-primary">
    <div class="card-header">
        <h4>Supervisión de rondas</h4>
        <div class="card-header-action">
          <a href="{{ route('position.create') }}" class="btn btn-primary btn-icon icon-right">Crear <i class="fas fa-chevron-right"></i></a>
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
              <th scope="col">Trabajador</th>
              <th scope="col">Lugar</th>
              <th scope="col">Fecha y hora</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($rounds as $key => $position)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $position->worker }}</td>
                <td>{{ $position->checkpoint }}</td>
                <td>{{ $position->date }}</td>
                <td width="100px">
                  <a class="btn btn-icon btn-primary btn-action mr-1" href="{{ route('position.edit', $position->id) }}"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $position->id }}, 'position.index-component', 'destroy')"><i class="fas fa-trash"></i></a>
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

      {{ $rounds->links() }}
    </div>
</div>