<div class="card card-primary">
    <div class="card-header">
        <h4>Puntos de control</h4>
        <div class="card-header-action">
          <a href="{{ route('checkpoint.create') }}" class="btn btn-primary btn-icon icon-right">Crear <i class="fas fa-chevron-right"></i></a>
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
              <th scope="col">Descripcion</th>
              <th scope="col" class="text-center">Estatus</th>
              <th scope="col">Fecha de creación</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($checkpoints as $key => $checkpoint)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td> 
                  {{ $checkpoint->cp_description }}
                  
                </td>
                <td class="text-center">
                  {!! $checkpoint->cp_status ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>' !!}
                </td>
                <td>{{ $checkpoint->date }}</td>
                <td width="100px">
                  <a class="btn btn-icon btn-primary btn-action mr-1" href="{{ route('checkpoint.edit', $checkpoint->id) }}"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $checkpoint->id }}, 'checkpoint.index-component', 'destroy')"><i class="fas fa-trash"></i></a>
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

      {{ $checkpoints->links() }}
    </div>
</div>