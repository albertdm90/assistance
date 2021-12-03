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
        <table class="table table-sm table-bordered table-hover">
          <thead>
            <tr class="primary">
              <th scope="col">Registro</th>
              <th scope="col">Trabajador</th>
              <th scope="col">Lugar</th>
              <th scope="col" colspan="2">Fecha y hora de la rondas</th>
              <th scope="col">Estatus</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($rounds as $key => $round)
            <tr>
              <td class="text-muted">
                <ul style="list-style: none;padding-inline-start: 0;">
                  <li>{{ $round->register }}</li>
                  <li>{{ $round->cod_uuid }}</li>
                </ul>
                
              </td>
              <td>{!! $round->worker !!}</td>
              <td>
                <ul style="list-style: none;padding-inline-start: 0;">
                  <li>{{ $round->checkpoint }}</li>
                  <li>Latitud: {{ $round->rou_lat }}</li>
                  <li>Longitud: {{ $round->rou_long }}</li>
                </ul>
              </td>
              <td width="100px">{{ $round->date }}</td>
              <td width="100px">{{ $round->hour }}</td>
              <td width="100px" class="text-center">{!! $round->status !!}</td>
              <td width="100px">
                <a class="btn btn-icon btn-info btn-action" href="{{ route('worker.show', $round->wor_id) }}">
                  <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $round->id }}, 'round.index-component', 'destroy')"><i class="fas fa-trash"></i></a>
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