@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-4">
      <div class="card author-box">
        <div class="card-body">
          <div class="author-box-center">
            <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
            <div class="clearfix"></div>
            <div class="author-box-name">
              <a href="#">{{ Auth::user()->name }}</a>
            </div>
            <div class="author-box-job">Administrador</div>
          </div>
          
        </div>
      </div>
     
    </div>
    <div class="col-12 col-md-12 col-lg-8">
      <div class="card">
        <div class="padding-20">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                aria-selected="false">Editar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#passwordEdit" role="tab"
                aria-selected="false">Contraseña</a>
            </li>
          </ul>
          <div class="tab-content tab-bordered" id="myTab3Content">
            
            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
              @livewire('profile.edit-profile-component')
            </div>
            <div class="tab-pane fade" id="passwordEdit" role="tabpanel" aria-labelledby="profile-tab2">
              @livewire('profile.password-profile-component')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
