
<div class="card-body p-0">

	@include('livewire.worker.includes.'.$view.'WorkSchelude')

	<hr>
	<div class=" card-header">
		<h4>Lista de horarios</h4>
	</div>
	<div class="table-responsive">
		<table class="table table-sm table-hover">
			<thead>
				<tr>
					<th>Punto de control</th>
					<th>Día</th>
					<th>Hora</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($workSchedules as $workSchedule)	
					<tr>
						<td>{{ $workSchedule->checkpoint }}</td>
						<td>{{ $workSchedule->day }}</td>
						<td>{{ $workSchedule->hour }}</td>
						<td>
							<a class="btn btn-icon btn-primary btn-action mr-1" href="javascrip:void(0)" wire:click="edit({{ $workSchedule->id }})"><i class="fas fa-pencil-alt"></i></a>
							<a class="btn btn-icon btn-danger btn-action" href="javascript:void(0)" wire:click="$emit('delete', {{ $workSchedule->id }}, 'worker.work-schedule-component', 'destroy')"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4" class="text-center text-muted">Sin registro</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
