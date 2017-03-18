@extends('admin.plantilla.principal')
@section('titulo','Listado de Usuarios')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista de usuarios</h2>
	<hr>
	<a href="{{route('user.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar Usuario</a> <a href="{{route('incidente.generar.pdp.usuarios')}}" class="btn btn-danger"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>

	<!-- Formulario para el buscador de Tags-->
    {!! Form::open (['route'=>'usuario.listar', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar usuario...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('usuario.listar')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
    <!-- Fin Formulario para el buscador de Tags-->
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped table-condensed">
		<thead><div></div>
			<th>Apellido</th>
			<th>Nombre</th>
			<th>Correo eléctronico</th>
			<th>Tipo de usuario</th>
			<th>Oficina</th>
			<th>Área</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{$usuario->apellido}}</td>
					<td>{{$usuario->name}}</td>
					<td>{{$usuario->email}}</td>
					@if($usuario->is('admin'))
						<td><span class="label label-success">{{"Administrador"}}</span></td>
					@elseif($usuario->is('tecnicohs'))
						<td><span class="label label-primary">{{"Tecnico Hardware-Software"}}</span></td>
					@elseif($usuario->is('tecnicori'))
						<td><span class="label label-primary">{{"Tecnico Red-Internet"}}</span></td>
					@else
						<td><span class="label label-default">{{"Miembro"}}</span></td>
					@endif
					@if($usuario->oficina)
						<td>{{$usuario->oficina->oficina}}</td>
					@else
						<td>{{'Sin oficina'}}</td>
					@endif
					@if($usuario->oficina and $usuario->oficina->area)
						<td>{{$usuario->oficina->area->nombre_area}}</td>
					@else
						<td>{{"Sin área"}}</td>
					@endif
					<td>
						<a href="{{route('admin.usuarios_crud.edit',$usuario->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
						<a href="{{route('usuario.borrar',$usuario->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro que desea borrar este registro?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
						@if($usuario->equipo)
							<a href="{{route('user.getEequipo',$usuario->equipo->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-television" aria-hidden="true"></i> Equipo</a>
						@else
							<button type="button" class="btn btn-primary btn-sm disabled"><i class="fa fa-television" aria-hidden="true"></i> Equipo</button>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $usuarios->render() !!}
@endsection