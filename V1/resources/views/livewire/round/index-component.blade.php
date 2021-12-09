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
              <th scope="col" width="20%">Lugar</th>
              <th scope="col" colspan="2" width="30%">Fecha y hora de la rondas</th>
              <th scope="col" width="10%">Acciones</th>
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
                @if (isset($round->rou_lat) && isset($round->rou_long))    
                  <a href="{{ route('maps', ['lat' => $round->rou_lat, 'long' => $round->rou_long]) }}" target="blank" class="btn btn-sm btn-primary">
                    <i class="fas fa-map-marker"></i>
                  </a>
                @endif

                
                {{ $round->checkpoint }}
           
              </td>
              <td width="50px">{{ $round->date }}</td>
              <td width="100px">{{ $round->hour }}</td>
              <td width="100px" class="text-right">
                {!! $round->status !!}
                <a class="btn btn-icon btn-info btn-action m-r-5" href="{{ route('round.show', $round->wor_id) }}">
                  <i class="fas fa-eye"></i>
                </a>
                {{-- <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $round->id }}, 'round.index-component', 'destroy')"><i class="fas fa-trash"></i></a> --}}
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