@extends('admin.plantilla.principal')
@section('titulo','Listado de Procesadores')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Procesadores</h2>
	<!-- Formulario para el buscador de Tags-->
    {!! Form::open (['route'=>'procesador.index.tecnicohs', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('modelo_procesador', null, ['class'=>'form-control', 'placeholder'=>'Buscar modelo...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('procesador.index.tecnicohs')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
    <!-- Fin Formulario para el buscador de Tags-->
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead><div></div>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Capacidad</th>
			<th>Nucelos</th>
			<th>Socket</th>
			<th>¿Disponible?</th>
		</thead>
		<tbody>
			@foreach($procesadores as $procesador)
				<tr>
					<td>{{$procesador->marca_procesador}}</td>
					<td>{{$procesador->modelo_procesador}}</td>
					<td>{{$procesador->capacidad_procesador}}</td>
					<td>{{$procesador->core_procesador}}</td>
					<td>{{$procesador->socket_procesador}}</td>
					@if($procesador->disponible == "si")
						<td><span class="label label-success">{{$procesador->disponible}}</span></td>
					@else
						<td><span class="label label-default">{{$procesador->disponible}}</span></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $procesadores->render() !!}
@endsection