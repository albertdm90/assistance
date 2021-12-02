<form action="" wire:submit.prevent="store">
  @include('livewire.worker.partials.formWorkSchedule')
  <div class="form-group col-sm-12 text-center">
      <button class="btn btn-sm btn-primary btn-icon icon-right" type="submit">Guardar <i class="fas fa-chevron-right"></i></button>
  </div>
</form>