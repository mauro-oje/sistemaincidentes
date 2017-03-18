@extends('admin.plantilla.principal')
@section('titulo','Listado de memorias')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Memorias RAM</h2>
    {!! Form::open (['route'=>'memoria.ram.index.ri', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
	    <div class="form-group">
	        {!! form::text('marca_memoria', null, ['class'=>'form-control', 'placeholder'=>'Buscar marca...', 'aria-describedby'=>'search']) !!}
	        <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
	    </div>
	    {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
	    <a href="{{route('memoria.ram.index.ri')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead><div></div>

			<th>Tipo</th>
			<th>Marca</th>
			<th>Capacidad/Unidad</th>
			<th>Frecuencia</th>
			<th>¿Disponible?</th>
		</thead>
		<tbody>
			@foreach($memorias as $memoria)
				<tr>
					<td>{{$memoria->tipo_memoria}}</td>
					<td>{{$memoria->marca_memoria}}</td>
					<td>{{$memoria->capacidad_memoria}}</td>
					<td>{{$memoria->frecuencia}}</td>
					@if($memoria->disponible == "si")
						<td><span class="label label-success">{{$memoria->disponible}}</span></td>
					@else
						<td><span class="label label-default">{{$memoria->disponible}}</span></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $memorias->render() !!}
@endsection