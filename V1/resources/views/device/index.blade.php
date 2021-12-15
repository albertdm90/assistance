@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-12">
    @livewire('device.index-component', [
      'search' => $search
    ])
  </div>
</div>
@endsection

