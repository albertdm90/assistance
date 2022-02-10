<div class="card">
  <div class="card-header">
    <h4>Rondas</h4>
  </div>
  <div class="card-body">

          <ul class="list-group">
              @forelse ($rounds as $r)
              <li class="list-group-item list-group-item-action {{ $rou_id == $r->id ? 'active' : '' }} d-flex justify-content-between align-items-center">
                  <a href="javascript:void(0)" wire:click="show({{ $r->id }})")>
                      {!! $r->date.'<br/>'.$r->cp_description !!}
                  </a>
                  {!! $r->status !!}
                </li>
              @empty
                  <li>Sin registro</li>
              @endforelse
          </ul>
      {{ $rounds->links() }}
  </div>
</div>