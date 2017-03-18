@extends('admin.plantilla.principal')
@section('titulo','Listado de Oficinas')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de oficinas</h2>
	<a href="{{route('oficina.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar Oficina</a>
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead><div></div>
			<th>Oficinas</th>
			<th>Área</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($oficinas as $oficina)
				<tr>
					<td>{{$oficina->oficina}}</td>
					@if($oficina->area)
						<td>{{$oficina->area->nombre_area}}</td>
					@else
						<td>{{"Sin área"}}</td>
					@endif
					<td>
						<a href="{{route('admin.oficina_crud.edit',$oficina->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
						<a href="{{route('oficina.borrar',$oficina->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro que desea borrar este registro?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $oficinas->render() !!}
@endsection