<div class="form-group">
  <label>Descripción</label>
  <textarea class="form-control{{ $errors->has('cp_description') ? ' is-invalid' : '' }}" wire:model="cp_description" name="cp_description"></textarea>
  @error('cp_description') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
  <label>Código para etiqueta</label>
  <input type="text" class="form-control{{ $errors->has('cp_code') ? ' is-invalid' : '' }}" wire:model="cp_code" name="cp_code">
  @error('cp_code') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label>Latitud</label>
      <input type="text" class="form-control{{ $errors->has('cp_lat') ? ' is-invalid' : '' }}" wire:model="cp_lat" name="cp_lat">
      @error('cp_lat') <div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    
    <div class="form-group">
      <label>Longitud</label>
      <input type="text" class="form-control{{ $errors->has('cp_long') ? ' is-invalid' : '' }}" wire:model="cp_long" name="cp_long">
      @error('cp_long') <div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="col-sm-6">
    <iframe src="{{ 'http://maps.google.com/maps?q='.$cp_lat.','.$cp_long.'&z=15&output=embed'}}" style="width:100%; height:25vh"></iframe>
  </div>
</div>


<div class="form-group">
  <label>Estatus</label>
  <select class="form-control{{ $errors->has('cp_status') ? ' is-invalid' : '' }}" wire:model="cp_status" name="cp_status">
    <option value="1">Activo</option>
    <option value="0">Inactivo</option>
  </select>
  @error('cp_status') <div class="invalid-feedback">{{ $message }}</div>@enderror
</div>