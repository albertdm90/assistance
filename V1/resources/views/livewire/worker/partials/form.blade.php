<div class="row">

  <div class="form-group col-sm-6">
    <label>Nacionalidad</label>
    <select class="form-control{{ $errors->has('wor_nacionality') ? ' is-invalid' : '' }}" wire:model="wor_nacionality" name="wor_nacionality">
      <option>Seleccione</option>
      <option value="Venezolana">Venezolana</option>
      <option value="Extranjera">Extranjera</option>
    </select>
    @error('wor_nacionality') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-6">
    <label>Número de identificación</label>
    <input type="text" class="form-control{{ $errors->has('wor_id_number') ? ' is-invalid' : '' }}" wire:model="wor_id_number" name="wor_id_number">
    @error('wor_id_number') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-4">
    <label>Nombre</label>
    <input type="text" class="form-control{{ $errors->has('wor_name') ? ' is-invalid' : '' }}" wire:model="wor_name" name="wor_name">
    @error('wor_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-4">
    <label>Apellido</label>
    <input type="text" class="form-control{{ $errors->has('wor_lastname') ? ' is-invalid' : '' }}" wire:model="wor_lastname" name="wor_lastname">
    @error('wor_lastname') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-4">
    <label>Correo electrónico</label>
    <input type="email" class="form-control{{ $errors->has('wor_email') ? ' is-invalid' : '' }}" wire:model="wor_email" name="wor_email">
    @error('wor_email') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  
  <div class="form-group col-sm-12">
    <label>Dirección de habitación</label>
    <textarea class="form-control{{ $errors->has('wor_home_address') ? ' is-invalid' : '' }}" wire:model="wor_home_address" name="wor_home_address"></textarea>
    @error('wor_home_address') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-6">
    <label>Tipo de contrato</label>
    <select class="form-control{{ $errors->has('wor_type_contract') ? ' is-invalid' : '' }}" wire:model="wor_type_contract" name="wor_type_contract">
      <option>Seleccione</option>
      <option value="Contratado">Contratado</option>
      <option value="Fijo">Fijo</option>
    </select>
    @error('wor_type_contract') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-6">
    <label>Cargo</label>
    <select class="form-control{{ $errors->has('pos_id') ? ' is-invalid' : '' }}" wire:model="pos_id" name="pos_id">
      <option>Seleccione</option>
      @foreach ($positions as $position)
        <option value="{{ $position->id }}">{{ $position->pos_name }}</option>
      @endforeach
    </select>
    @error('pos_id') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>