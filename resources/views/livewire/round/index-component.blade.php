<div class="row">

  <div class="col-sm-3">
    <div class="card card-info">
      <div class="card-header">
        <h4>Filtro</h4>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="typeSearch">Buscando por</label>
          <select class="form-control mx-sm-1" id="typeSearch" wire:model="typeSearch">
            <option value="today">Dia</option>
            <option value="month">Mes actual</option>
            <option value="last-month">Mes anterior</option>
            <option value="year">Año</option>
            <option value="date">Fecha</option>
            <option value="all">Todos</option>
          </select>
        </div>

        @if ($typeSearch == 'date')
          <div class="form-group">
            <label for="dateStart">Desde</label>
            <input type="date" id="dateStart" class="form-control mx-sm-1" aria-describedby="passwordHelpInline" wire:model="date_start">
          </div>
          <div class="form-group">
            <label for="dateEnd">Hasta</label>
            <input type="date" id="dateEnd" class="form-control mx-sm-1" aria-describedby="passwordHelpInline" wire:model="date_end">
          </div>
        @endif

        <div class="form-group">
          <label for="status">Estatus</label>
          <select class="form-control mx-sm-1" id="status" wire:model="status">
            <option value="">Todos</option>
            <option value="1">Dentro del horario</option>
            <option value="2">Fuera del horario</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    <div class="card card-primary">
      <div class="card-header">
          <h4>Supervisión de rondas</h4>
          
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
                <th scope="col" width="20%">Registro</th>
                <th scope="col" width="20%">Trabajador</th>
                <th scope="col" width="20%">Datos de la ronda</th>
                <th scope="col" width="25%">Estatus</th>
                <th scope="col" width="15%">Acciones</th>
              </tr>
            </thead>
            <tbody>
  
              @forelse ($rounds as $key => $round)
              <tr>
                <td class="text-muted">
                  <ul style="list-style: none;padding-inline-start: 0;">
                    <li>{{ $round->register }}</li>
                    <li>
                      <a href="{{ route('device.index', $round->cod_uuid) }}">{{ $round->cod_uuid }}</a>
                    </li>
                  </ul>
                  
                </td>
                <td>{!! $round->worker !!}</td>
                <td>                  
                  <span>Lugar: {{ $round->checkpoint }}</span><br>
                  <span>Fecha: {{ $round->date }}</span><br>
                  <span>Hora: {{ $round->hour }}</span>
                </td>
                <td>
                  {!! $round->status !!} <br>
                  {!! $round->distance !!}
                </td>
                <td class="text-right">
                  @if (isset($round->rou_lat) && isset($round->rou_long))    
                    <a href="{{ route('maps', ['lat' => $round->rou_lat, 'long' => $round->rou_long]) }}" target="blank" class="btn btn-icon btn-primary btn-action m-r-2">
                      <i class="fas fa-map-marker"></i>
                    </a>
                  @endif
                  <a class="btn btn-icon btn-info btn-action m-r-2" href="{{ route('round.show', $round->id) }}">
                    <i class="fas fa-eye"></i>
                  </a>
                  {{-- <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $round->id }}, 'round.index-component', 'destroy')"><i class="fas fa-trash"></i></a> --}}
                </td>
              </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center text-muted">Sin registro</td>
                </tr>
              @endforelse
  
             
              
            </tbody>
          </table>
        </div>
  
        {{ $rounds->links() }}
      </div>
  </div>
  </div>
</div>