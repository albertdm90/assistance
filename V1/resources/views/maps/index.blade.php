@extends('layouts.app')

@section('content')
<div class="row clearfix justify-content-center">
  <div class="col-12">
    <a href="javascript:close_tab();" class="btn btn-danger">Cerrar</a>
    <iframe src="{{ 'http://maps.google.com/maps?q='.$lat.','.$long.'&z=15&output=embed'}}" style="width:100%; height:100vh"></iframe>
  </div>
</div>
@endsection

@push('js')
<script>
  function close_tab() {
    window.close();
  }
</script>
    
@endpush