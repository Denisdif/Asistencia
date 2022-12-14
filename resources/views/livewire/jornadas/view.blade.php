@section('title', __('Jornadas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								<i class="fab fa-laravel text-info"></i>
								Jornadas de <span class="text-uppercase">{{ $categoria->nombre }}</span>
							</h4>
							
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Jornadas">
						</div> -->
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus mr-1"></i>  Crear nueva jornada
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.jornadas.create')
						@include('livewire.jornadas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center"> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Día</th>
								<th>Hora Entrada</th>
								<th>Hora Salida</th>
								<th>Tolerancia</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($jornadas as $row)
							<tr class="text-center">
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->tipo }}</td>
								<td>{{ $row->dia }}</td>
								<td>{{ $row->hora_entrada }}</td>
								<td>{{ $row->hora_salida }}</td>
								<td>{{ $row->tolerancia }}</td>

								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Jornada id {{$row->id}}? \nDeleted Jornadas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $jornadas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
