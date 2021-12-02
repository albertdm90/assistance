<div class="form-group">
  <label>Nombre</label>
  <input type="text" class="form-control{{ $errors->has('pos_name') ? ' is-invalid' : '' }}" wire:model="pos_name" name="pos_name">
  @error('pos_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea class="form-control{{ $errors->has('pos_description') ? ' is-invalid' : '' }}" wire:model="pos_description" name="pos_description"></textarea>
  @error('pos_description') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>