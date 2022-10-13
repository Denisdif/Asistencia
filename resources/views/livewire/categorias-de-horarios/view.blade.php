@section('title', __('Categorias De Horarios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4 class="text-uppercase"><i class="fab fa-laravel text-info"></i>
							Categorías de Horarios </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Categorias De Horarios">
						</div> -->
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus mr-1"></i>  Crear nueva categoría de horario
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.categorias-de-horarios.create')
						@include('livewire.categorias-de-horarios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center font-weight-bold text-uppercase"> 
								<td>#</td> 
								<th>Nombre</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($categoriasDeHorarios as $row)
							<tr>
								<td class="text-center">{{ $row->id }}</td> 
								<td>{{ $row->nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<a href="{{route('jornadas', $row->id)}}" class="dropdown-item"><i class="fa fa-eye"></i> Jornadas </a>							 
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Categorias De Horario id {{$row->id}}? \nDeleted Categorias De Horarios cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $categoriasDeHorarios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
