<div class="row">
    @switch($wor_status)
        @case(1)
            <div class="col-sm-8 text-success">
                Empleado activo para el registro de rondas.
            </div>
            <div class="col-sm-4">
                <button class="btn btn-action btn-danger btn-block" wire:click="update(0)">Inactivar empleado</button>
            </div>
        @break

        @case(0)
            <div class="col-sm-6 text-muted">
                El emplado no puede registrar rondas.
            </div>
            <div class="col-sm-3">
                <button class="btn btn-action btn-primary btn-block" wire:click="update(1)">Activar</button>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-action btn-danger btn-block" wire:click="update(2)">Suspender</button>
              </div>
        @break

        @case(2)
            <div class="col-sm-8 text-danger">
                El empleado puede registrar rondas pero no mas de 15 registros.
            </div>
        <div class="col-sm-4">
            <button class="btn btn-action btn-primary btn-block" wire:click="update(1)">Activar empleado</button>
          </div>
        @break         
    @endswitch
    
    
</div>