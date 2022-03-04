<form method="post" class="needs-validation" wire:submit.prevent="update">
    <div class="card-header">
      <h4>Editar perfil</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="form-group col-md-12 col-12">
          <label>Nombre</label>
          <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="" wire:model="name">
          @error('name') <div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
       
      </div>
      <div class="row">
        <div class="form-group col-md-12 col-12">
          <label>Correo Electrónico</label>
          <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" wire:model="email">
          @error('email') <div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>
     
    </div>
    <div class="card-footer text-right">
      <button class="btn btn-primary">Guardar cambios</button>
    </div>
  </form>