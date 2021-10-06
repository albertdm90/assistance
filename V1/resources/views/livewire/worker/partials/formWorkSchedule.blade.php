<div class="row">
  <div class="form-group col-sm-3">
    <label>Punto de control</label>
    <select class="form-control{{ $errors->has('cp_id') ? ' is-invalid' : '' }}" wire:model="cp_id" name="cp_id">
      <option>Seleccione</option>
      @foreach ($checkpoints as $key => $checkpoint)
        <option value="{{ $checkpoint->id }}">{{ $checkpoint->cp_description }}</option>
      @endforeach
    </select>
    @error('cp_id') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-3">
    <label>Día</label>
    <select class="form-control{{ $errors->has('ws_day') ? ' is-invalid' : '' }}" wire:model="ws_day" name="ws_day">
      <option>Seleccione</option>
      @foreach ($days as $key => $day)
        <option value="{{ $key }}">{{ $day }}</option>
      @endforeach
    </select>
    @error('ws_day') <div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="form-group col-sm-6">

    <label>Hora</label>
    <div class="input-group">
      <input type="time" class="form-control{{ $errors->has('ws_start_time') ? ' is-invalid' : '' }}" wire:model="ws_start_time">
      <input type="time" class="form-control{{ $errors->has('ws_end_time') ? ' is-invalid' : '' }}" wire:model="ws_end_time">
      @error('ws_start_time') <div class="invalid-feedback">{{ $message }}</div>@enderror
      @error('ws_end_time') <div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

  </div>
</div>