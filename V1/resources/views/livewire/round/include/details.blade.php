
    <div class="">
        <p class="clearfix"><span class="float-left">Dispositivo</span><span class="float-right text-muted"><a href="{{ route('device.index', $round->cod_uuid) }}">{{ $round->cod_uuid }}</a></span></p>
      <p class="clearfix"><span class="float-left">Fecha</span><span class="float-right text-muted">{{ $round->date }}</span></p>
      <p class="clearfix"><span class="float-left">Hora</span><span class="float-right text-muted">{{ $round->hour }}</span></p>
      <p class="clearfix"><span class="float-left">Estatus</span><span class="float-right text-muted">{!! $round->status !!}</span></p>
      <p class="clearfix"><span class="float-left">Punto de control</span><span class="float-right text-muted">{{ $round->cp_description }}</span></p>
     <div class="row">
         <div class="col-sm-6">
            <p class="clearfix"><span class="float-left">Ubicación del punto de control</span>
                @if (isset($round->cp_lat) && isset($round->cp_long))    
                    <div class="">
                        <iframe src="{{ 'http://maps.google.com/maps?q='.$round->cp_lat.','.$round->cp_long.'&z=15&output=embed'}}" style="width:100%; height:50vh"></iframe>
                    </div>
                @endif
                <span class="float-right text-muted">{{ isset($round->cp_lat) && isset($round->cp_long) ? $round->cp_lat.' '.$round->cp_long : 'Sin ubicación' }}</span>

            </p>
         </div>
         <div class="col-sm-6">
            <p class="clearfix"><span class="float-left">Ubicación de la ronda</span>
                @if (isset($round->rou_lat) && isset($round->rou_long))
                    <div class="">
                        <iframe src="{{ 'http://maps.google.com/maps?q='.$round->rou_lat.','.$round->rou_long.'&z=15&output=embed'}}" style="width:100%; height:50vh"></iframe>
                    </div>
                @endif
                <span class="float-right text-muted">{{ isset($round->rou_lat) &&  isset($round->rou_long) ? $round->rou_lat.' '.$round->rou_long : 'Sin ubicación' }}</span>

            </p>
         </div>
     </div>
    </div>
