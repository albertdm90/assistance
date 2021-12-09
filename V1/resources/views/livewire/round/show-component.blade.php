{{-- <div class="row">
    <div class="col-sm-8">
        @include('livewire.round.include.details')
    </div>

    <div class="col-sm-4">
        @include('livewire.round.include.info-worker')
    </div>

    <div class="col-sm-8">
        @include('livewire.round.include.rounds')
    </div>
</div> --}}

<div class="row">

    <style>
        
        .theme-white .list-group-item.active {
            background-color: #cfcfcf;
        
        }

    </style>

    {{-- <div class="col-sm-3">
        @include('livewire.round.include.info-worker')
    </div> --}}
    

    <div class="col-sm-4">
        @include('livewire.round.include.rounds')
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
              <h4>Detalles</h4>
              <div class="card-header-action">
                  <a href="javascript:void(0)" class="btn btn-outline-danger btn-icon icon-right" wire:click="goBack()">Volver <i class="fas fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="card-body">            
                <h6 class="text-right">{{ $worker->wor_name.' '.$worker->wor_lastname }}</h6>
                @include('livewire.round.include.details')
            </div>
          </div>
    </div>
</div>

