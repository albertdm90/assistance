<div class="card card-primary">
    <div class="card-header">
        <h4>Trabajadores</h4>
        <div class="card-header-action">

          <div class="dropdown ">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Opciones
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item has-icon" href="{{ route('worker.create') }}"><i class="fas fa-plus"></i> Crear</a>
              @if ($status == 1)
                <a class="dropdown-item has-icon text-danger" href="javascript:void(0)" wire:click="update(0)"><i class="fas fa-user-alt-slash"></i> Desactivar todos</a>
              @else
                <a class="dropdown-item has-icon text-success" href="javascript:void(0)" wire:click="update(1)"><i class="fas fa-user"></i> Activar todos</a>
              @endif
            </div>
          </div>
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
              <th scope="col">Identificación</th>
              <th scope="col">Empleado</th>
              <th scope="col" class="text-center">Estatus de la huella</th>
              <th scope="col">Fecha de creación</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($workers as $key => $worker)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>
                  <a href="{{ route('worker.show', $worker->id) }}">{{ $worker->wor_id_number }}</a>
                </td>
                <td>
                  {{ $worker->wor_name .' '. $worker->wor_lastname }}
                </td>
                <td class="text-center">
                  @switch($worker->wor_status)
                      @case(1)
                        <span class="badge badge-success">Activo</span>
                      @break
                      @case(2)
                        <span class="badge badge-primary">Suspendido</span>
                      @break
                      @case(0)
                        <span class="badge badge-danger">Inactivo</span>
                      @break
                      @default
                          
                  @endswitch
                </td>
                <td>{{ $worker->date }}</td>
                <td width="150px">
                  <a class="btn btn-icon btn-info btn-action" href="{{ route('worker.show', $worker->id) }}">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a class="btn btn-icon btn-primary btn-action" href="{{ route('worker.edit', $worker->id) }}"><i class="fas fa-pencil-alt"></i></a>
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