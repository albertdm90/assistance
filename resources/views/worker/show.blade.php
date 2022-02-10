@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-12">
    {{-- @livewire('worker.show-component', ['wor_id' => $wor_id]) --}}
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
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
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left">
                  Nacionalidad
                </span>
                <span class="float-right text-muted">
                  {{ $worker->wor_nacionality }}
                </span>
              </p>
  
              <p class="clearfix">
                <span class="float-left">
                  Número de identificación
                </span>
                <span class="float-right text-muted">
                  {{ $worker->wor_id_number }}
                </span>
              </p>

              <p class="clearfix">
                <span class="float-left">
                  Código PIN
                </span>
                <span class="float-right text-muted">
                  {{ $worker->wor_pin }}
                </span>
              </p>
  
              <p class="clearfix">
                <span class="float-left">
                  Dirección
                </span>
                <span class="float-right text-muted">
                  {{ $worker->wor_home_address }}
                </span>
              </p>
  
              <p class="clearfix">
                <span class="float-left">
                  Correo electrónico
                </span>
                <span class="float-right text-muted">
                  {{ $worker->wor_email }}
                </span>
              </p>
              
            </div>
          </div>
        </div>
  
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="home-tab2" data-toggle="tab" href="#configuration" role="tab" aria-selected="true">Configuración</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="hours_working" data-toggle="tab" href="#workSchedule" role="tab" aria-selected="false">Horario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#round" role="tab" aria-selected="false">Rondas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('worker.index') }}">Volver</a>
              </li>
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              
              <div class="tab-pane fade " id="configuration" role="tabpanel" aria-labelledby="home-tab2">
                <div class="row">
                  <div class="col-12  mt-3">
                    <h6>Código PIN</h6>
                    @livewire('worker.update-pin-component', ['wor_id'=> $worker->id])
                  </div>
                  <div class="col-12  mt-5">
                    <h6>Estatus del Empleado</h6>
                    @livewire('worker.update-status', ['wor_id'=> $worker->id])
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="workSchedule" role="tabpanel" aria-labelledby="home-tab2">
                @livewire('worker.work-schedule-component', ['wor_id'=> $worker->id])
              </div>
  
              <div class="tab-pane fade show active" id="round" role="tabpanel" aria-labelledby="profile-tab2">
                @livewire('worker.round-component', ['wor_id' => $worker->id])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


