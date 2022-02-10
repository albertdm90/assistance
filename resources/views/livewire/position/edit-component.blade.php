<form action="" wire:submit.prevent="store">
    <div class="card card-dark">
        <div class="card-header">
            <h4>Editar cargo</h4>
            <div class="card-header-action">
            </div>
        </div>
        <div class="card-body">
            @include('livewire.position.partials.form')
        </div>
        <div class="card-footer bg-whitesmoke text-right">
            <a href="{{ route('position.index') }}" class="btn btn-sm btn-outline-dark btn-icon icon-right"><i class="fas fa-chevron-left"></i> Volver</a>
            <button class="btn btn-sm btn-primary btn-icon icon-right" type="submit">Guardar <i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</form>