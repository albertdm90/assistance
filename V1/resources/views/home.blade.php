@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Puntos</h5>
                        <h2 class="mb-3 font-18">258</h2>
                        <p class="mb-0"><span class="col-green">10%</span> Activo</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="assets/img/banner/4.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Empleados</h5>
                        <h2 class="mb-3 font-18">258</h2>
                        <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="assets/img/banner/1.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Nuevas rondas</h5>
                        <h2 class="mb-3 font-18">258</h2>
                        {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="assets/img/banner/3.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
