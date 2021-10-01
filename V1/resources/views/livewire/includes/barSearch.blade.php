<div class="card-header-action">
  <div class="row">

    <div class="col-sm-6">
      <div class="form-inline">
        <div class="form-group">
          <label for="inputPassword6">Mostrando </label>
          <select class="form-control-sm mx-sm-3" id="inputPassword6" wire:model="row">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
          </select>
          <label for="inputPassword6"> elementos</label>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group" style="display: flex">
        <label for="inputPassword6">Buscar:</label>
        <input type="password" id="inputPassword6" class="form-control mx-sm-1" aria-describedby="passwordHelpInline" wire:model="search">
      </div>
    </div>
    
  </div>
</div>