<div class="card card-primary">
    <div class="card-header">
        <h4>Dispositivos registrados</h4>
        <div class="card-header-action">
          <a href="javascript:void(0)" wire:click="destroyAll()" class="btn btn-danger btn-icon icon-right">Eliminar todos <i class="fas fa-trash"></i></a>
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
              <th scope="col">Dispositivo</th>
              <th scope="col">Fecha de creación</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($devices as $key => $device)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $device->cod_uuid }}</td>
                <td>{{ $device->date }}</td>
                <td width="100px">
                  <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $device->id }}, 'device.index-component', 'destroy')"><i class="fas fa-trash"></i></a>
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

      {{ $devices->links() }}
    </div>
</div>