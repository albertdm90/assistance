@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-8">
    @livewire('checkpoint.edit-component', ['cp_id' => $cp_id])
  </div>
</div>
@endsection

