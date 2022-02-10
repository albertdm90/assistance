<div class="card author-box">
  <div class="card-body">
    <div class="author-box-center">
      <img alt="image" src="{{ asset('images/security.png')}}" class="rounded-circle author-box-picture">
      <div class="clearfix"></div>
      <div class="author-box-name">
        <a href="#">{{ $worker->wor_name.' '.$worker->wor_lastname }}</a>
      </div>

      <div class="author-box-job"> {{ $worker->wor_type_contract }}</div>

    </div>

  </div>

  
</div>

<div class="card">
  <div class="card-header">
    <h4>Detalles personales</h4>
  </div>
  <div class="card-body">
    <div class="">
      <p class="clearfix"><span class="float-left">Nacionalidad</span><span class="float-right text-muted">{{ $worker->wor_nacionality }}</span></p>
      <p class="clearfix"><span class="float-left">Número de identificación</span><span class="float-right text-muted">{{ $worker->wor_id_number }}</span></p>
      <p class="clearfix"><span class="float-left">Dirección</span><span class="float-right text-muted">{{ $worker->wor_home_address }}</span></p>
      <p class="clearfix"><span class="float-left">Correo electrónico</span><span class="float-right text-muted">{{ $worker->wor_email }}</span></p>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h4>Horario</h4>
  </div>
  <div class="card-body">
    <div class="">             
      @forelse ($schedules as $schedule)
          <p class="clearfix"><span class="float-left">{{ $schedule->day }}</span><span class="float-right text-muted">{{ $schedule->hour }}</span></p>
      @empty
          <p class="clearfix"><span class="float-left">No tiene horario</span><span class="float-right text-muted">{{ $round->date }}</span></p>
      @endforelse
    </div>
  </div>
</div>