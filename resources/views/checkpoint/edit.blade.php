@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-sm-8">
    @livewire('checkpoint.edit-component', ['cp_id' => $cp_id])
  </div>
</div>
@endsection

@push('js')
  <script>

window.addEventListener('getLocation', event => { 
  navigator.geolocation ? navigator.geolocation.getCurrentPosition(showPosition) : 
  iziToast.error({
    message: 'La geolocalización no es compatible con este navegador.',
    position: 'topRight'
  });
  
  function showPosition(position) {
    Livewire.emitTo('checkpoint.edit-component', 'showLatLong', position.coords.latitude, position.coords.longitude);
  }
})

  </script>
@endpush

