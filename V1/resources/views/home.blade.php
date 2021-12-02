@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            @livewire('dashboard.card-info', ['type' => 'chechkpoint'])
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          @livewire('dashboard.card-info', ['type' => 'worker'])
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          @livewire('dashboard.card-info', ['type' => 'round'])
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
