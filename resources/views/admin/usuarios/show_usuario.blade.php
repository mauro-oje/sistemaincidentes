@extends('admin.plantilla.principal')
@section('titulo','Usuarios')
@section('contenido')

	<h3 class="text-center"><i class="fa fa-database" aria-hidden="true"></i> Mis datos</h3>
	@if(Auth::user()->tipo == "admin")
		<a href="{{route('user.crear')}}" class="btn btn-primary">Registrar Usuario</a>
	@endif
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	
	<table class="table table-striped">
		<thead><div></div>
			
			<th>Apelido y Nombre</th>
			<th>Correo eléctronico</th>
			<th>Tipo de usuario</th>
			<th>Oficina</th>
			<th>Área</th>
		</thead>

		<tbody>
			
			<td>{{$usuario->apellido.' '.$usuario->name}}</td>
			<td>{{$usuario->email}}</td>
			@if($usuario->tipo == "tecnicoHS")
				<td><span class="label label-primary">{{"Hardware/Software"}}</span></td>
			@elseif($usuario->tipo == "tecnicoRI")
				<td><span class="label label-primary">{{"Red/Internet"}}</span></td>
			@elseif($usuario->tipo == "miembro")
				<td><span class="label label-default">{{"Miembro"}}</span></td>
			@else
				<td><span class="label label-success">{{"Administrador"}}</span></td>
			@endif
			@if($usuario->oficina)
				<td>{{$usuario->oficina->oficina}}</td>
			@else
				<td>{{'Sin oficina'}}</td>
			@endif
			@if($usuario->oficina)
				<td>{{$usuario->oficina->area->nombre_area}}</td>
			@else
				<td>{{'Sin Área'}}</td>
			@endif

		</tbody>
	</table>
	<hr>


@endsection