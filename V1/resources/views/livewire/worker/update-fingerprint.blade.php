<div class="row">
    @switch($wor_status)
        @case(1)
            <div class="col-sm-8 text-muted">
                Ya se ha actualizado la huella de este empleado.
            </div>
            <div class="col-sm-4">
                <button class="btn btn-action btn-primary btn-block" wire:click="update(2)">Actualizar huella</button>
            </div>
        @break

        @case(0)
            <div class="col-sm-8 text-muted">
                No se ha actualizado la huella de este empleado.
            </div>
            <div class="col-sm-4">
                <button class="btn btn-action btn-primary btn-block" wire:click="update(2)">Actualizar huella</button>
            </div>
        @break

        @case(2)
            <div class="col-sm-8 text-muted">
                En espera del registro en la app móvil.
            </div>
        <div class="col-sm-4">
            <button class="btn btn-action btn-danger btn-block" wire:click="update(1)">Cancelar huella</button>
          </div>
        @break         
    @endswitch
    
    
</div>