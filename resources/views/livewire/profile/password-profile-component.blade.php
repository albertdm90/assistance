<form method="post" class="needs-validation" wire:submit.prevent="update">
    <div class="card-header">
      <h4>Editar contraseña</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="form-group col-md-12 col-12">
          <label>Contraseña actual</label>
          <input type="password" class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}" name="password_current" wire:model="password_current">
          @error('password_current') <div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-12 col-12">
          <label>Contraseña nueva</label>
          <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" wire:model="password">
          @error('password') <div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-12 col-12">
          <label>Confirmar contraseña nueva</label>
          <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" wire:model="password_confirmation">
          @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>     
    </div>
    <div class="card-footer text-right">
      <button class="btn btn-primary">Actualizar</button>
    </div>
  </form>