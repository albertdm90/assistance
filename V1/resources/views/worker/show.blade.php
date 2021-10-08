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
              <div class="author-box-job">{{ $worker->position->pos_name }} <br> {{ $worker->wor_type_contract }}</div>
            </div>
  
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Personal Details</h4>
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
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#configuration" role="tab" aria-selected="true">Configuración</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="hours_working" data-toggle="tab" href="#workSchedule" role="tab" aria-selected="false">Horario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#round" role="tab" aria-selected="false">Rondas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('worker.index') }}">Volver</a>
              </li>
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              
              <div class="tab-pane fade show active" id="configuration" role="tabpanel" aria-labelledby="home-tab2">
                @livewire('worker.update-pin-component', ['wor_id'=> $worker->id])
              </div>

              <div class="tab-pane fade" id="workSchedule" role="tabpanel" aria-labelledby="home-tab2">
                @livewire('worker.work-schedule-component', ['wor_id'=> $worker->id])
              </div>
  
              <div class="tab-pane fade" id="round" role="tabpanel" aria-labelledby="profile-tab2">
                <form method="post" class="needs-validation">
                  <ul class="list-unstyled list-unstyled-border">
                      <li class="media">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="cbx-1">
                          <label class="custom-control-label" for="cbx-1"></label>
                        </div>
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-5.png">
                        <div class="media-body">
                          <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                          <h6 class="media-title"><a href="#">Logo design task</a></h6>
                          <div class="text-small text-muted">Cara Stevens <div class="bullet"></div> <span class="text-primary">Now</span></div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="cbx-2" checked="">
                          <label class="custom-control-label" for="cbx-2"></label>
                        </div>
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-4.png">
                        <div class="media-body">
                          <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                          <h6 class="media-title"><a href="#">Changes related to upload file </a></h6>
                          <div class="text-small text-muted">Hasan Basri <div class="bullet"></div> 4 Min</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="cbx-3">
                          <label class="custom-control-label" for="cbx-3"></label>
                        </div>
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-9.png">
                        <div class="media-body">
                          <div class="badge badge-pill badge-warning mb-1 float-right">Progress</div>
                          <h6 class="media-title"><a href="#">Upload build on server</a></h6>
                          <div class="text-small text-muted">John Doe <div class="bullet"></div> 8 Min</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="cbx-4">
                          <label class="custom-control-label" for="cbx-4"></label>
                        </div>
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-10.png">
                        <div class="media-body">
                          <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                          <h6 class="media-title"><a href="#">Deliverd product to client</a></h6>
                          <div class="text-small text-muted">Sarah Smith <div class="bullet"></div> 21 Min</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="cbx-8">
                          <label class="custom-control-label" for="cbx-8"></label>
                        </div>
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-8.png">
                        <div class="media-body">
                          <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                          <h6 class="media-title"><a href="#">Admin panel bug solve</a></h6>
                          <div class="text-small text-muted">Poonam Patel <div class="bullet"></div> 11 Min</div>
                        </div>
                      </li>
                    </ul>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Eliminar</button>
                    <button class="btn btn-primary">Verificar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


