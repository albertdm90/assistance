<form action="" wire:submit.prevent="update">
  @include('livewire.worker.partials.formWorkSchedule')
  <div class="form-group col-sm-12 text-center">
      <button class="btn btn-sm btn-primary btn-icon icon-right" type="submit">Guardar <i class="fas fa-chevron-right"></i></button>
      <button class="btn btn-sm btn-danger btn-icon icon-right" wire:click="default()" type="button">Cancelar <i class="fas fa-chevron-right"></i></button>
  </div>
</form>