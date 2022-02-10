@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Registro</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group col-12">
                                <label for="frist_name">Nombre</label>
                                <input id="frist_name" type="text" class="form-control{{ $errors->has('name') ? '  is-invalid' : '' }}" name="name" autofocus required :value="old('name')">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="email">Correo electrónico</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? '  is-invalid' : '' }}" name="email" required :value="old('email')">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Contraseña</label>
                                        <input id="password" type="password" class="form-control pwstrength{{ $errors->has('password') ? '  is-invalid' : '' }}" data-indicator="pwindicator" name="password" required>
                                        @error('password') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Confirmar contraseña</label>
                                        <input id="password2" type="password" class="form-control{{ $errors->has('password_confirmation') ? '  is-invalid' : '' }}" name="password_confirmation">
                                        @error('password_confirmation') <div class="invalid-feedback">{{ $message }}
                                        </div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                                    <label class="custom-control-label" for="agree">Estoy de acuerdo con los <a href="{{ route('policy.index') }}" target="blank">términos y condiciones</a></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Registrar
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center mt-4 mb-3">
                            <div class="text-job text-muted">Registrate con tus redes sociales</div>
                          </div>
                        {{-- @include('includes.btnSocial') --}}
                    </div>
                    <div class="mb-4 text-muted text-center">
                        ¿Ya registrado? <a href="{{ route('login') }}">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
