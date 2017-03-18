@extends('admin.plantilla.principal')
@section('titulo','Listado de Área')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de áreas</h2>
	<a href="{{route('area.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar Área</a>
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead><div></div>
			<th>Áreas</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($areas as $area)
				<tr>
					<td>{{$area->nombre_area}}</td>
					<td>
						<a href="{{route('admin.area_crud.edit',$area->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
						<a href="{{route('area.borrar',$area->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro que desea eliminar este registro?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $areas->render() !!}
@endsection