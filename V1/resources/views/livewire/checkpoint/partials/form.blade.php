<div class="form-group">
  <label>Descripción</label>
  <textarea class="form-control{{ $errors->has('cp_description') ? ' is-invalid' : '' }}" wire:model="cp_description" name="cp_description"></textarea>
  @error('cp_description') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
  <label>Estatus</label>
  <select class="form-control{{ $errors->has('cp_status') ? ' is-invalid' : '' }}" wire:model="cp_status" name="cp_status">
    <option value="1">Activo</option>
    <option value="0">Inactivo</option>
  </select>
  @error('cp_status') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>