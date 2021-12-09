
    <div class="">
      <p class="clearfix"><span class="float-left">Fecha</span><span class="float-right text-muted">{{ $round->date }}</span></p>
      <p class="clearfix"><span class="float-left">Hora</span><span class="float-right text-muted">{{ $round->hour }}</span></p>
      <p class="clearfix"><span class="float-left">Estatus</span><span class="float-right text-muted">{!! $round->status !!}</span></p>
      <p class="clearfix"><span class="float-left">Punto de control</span><span class="float-right text-muted">{{ $round->cp_description }}</span></p>
      <p class="clearfix"><span class="float-left">Ubicación</span><span class="float-right text-muted">{{ isset($round->rou_lat) ? $round->rou_lat.' '.$round->rou_long : 'Sin ubicación' }}</span>
          <span class="">
              <iframe src="{{ 'http://maps.google.com/maps?q='.$round->rou_lat.','.$round->rou_long.'&z=15&output=embed'}}" style="width:100%; height:50vh"></iframe>
          </span>
      </p>
    </div>
