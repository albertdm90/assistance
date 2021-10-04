@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-12">
    @livewire('worker.show-component', ['wor_id' => $wor_id])
  </div>
</div>
@endsection


