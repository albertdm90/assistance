<div method="post" class="needs-validation">
  <ul class="list-unstyled list-unstyled-border">
    @forelse ($rounds as $key => $round)
        <li class="media">
          {{-- <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" wire:model="rounds_id.{{ $key }}" id="cbx-{{ $key }}" value="{{ $round->id }}">
            <label class="custom-control-label" for="cbx-{{ $key }}"></label>
          </div> --}}
          <div class="media-body">
            {!! $round->status !!}
            
            <h6 class="media-title">
              @if (isset($round->rou_lat) && isset($round->rou_long))    
                <a href="{{ route('maps', ['lat' => $round->rou_lat, 'long' => $round->rou_long]) }}" target="blank" class="btn btn-sm btn-primary">
                  <i class="fas fa-map-marker"></i>
                </a>
              @endif
              <a href="{{ route('round.show', $round->id) }}">{{ $round->cp_description }}</a>
            </h6>
            <div class="text-small text-muted">{{ $round->date }} <div class="bullet"></div> {{ $round->hour }}</div>
          </div>
        </li>
        @empty
        <span>Sin resultados</span>
        @endforelse
    </ul>
    {{ $rounds->links() }}
    {{-- @if (count($rounds) > 0)
        <div class="card-footer text-right">
            <button class="btn btn-success" type="button" wire:click="updateAll(2)">Verificar</button>
            <button class="btn btn-danger" type="button" wire:click="updateAll(3)">Eliminar</button>
            <button class="btn btn btn-outline-danger" type="button" wire:click="$emit('delete', '', 'worker.round-component', 'deleteAll')">Eliminar definitivamente</button>
        </div>
    @endif --}}
  </div>