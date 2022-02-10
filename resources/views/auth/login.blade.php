@extends('layouts.guest')

@section('content')

<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Iniciar sesión</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
              <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? '  is-invalid' : '' }}" name="email" tabindex="1" :value="old('email')" required autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div>@enderror
                
              </div>
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Contraseña</label>
                  <div class="float-right">
                    <a href="{{ route('password.request') }}" class="text-small">¿Has olvidado tu contraseña?</a>
                  </div>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? '  is-invalid' : '' }}" name="password" tabindex="2" :value="old('password')" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" value="1">
                  <label class="custom-control-label" for="remember-me">Recuérdame</label>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Iniciar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection