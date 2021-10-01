@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-8">
    @livewire('position.edit-component', ['pos_id' => $pos_id])
  </div>
</div>
@endsection

