@extends('admin.plantilla.principal')
@section('titulo','Listado de Discos')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Discos duros</h2>
	{!! Form::open (['route'=>'disco.duro.index.hs', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('marca_disco', null, ['class'=>'form-control', 'placeholder'=>'Buscar marca...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('disco.duro.index.hs')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead><div></div>
			<th>Tipo</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Capacidad/Unidad</th>
			<th>Interface</th>
			<th>¿Disponible?</th>
		</thead>
		<tbody>
			@foreach($discos as $disco)
				<tr>
					<td>{{$disco->tipo_disco}}</td>
					<td>{{$disco->marca_disco}}</td>
					<td>{{$disco->modelo_disco}}</td>
					<td>{{$disco->capacidad_disco}}</td>
					<td>{{$disco->interface}}</td>
					@if($disco->disponible == "si")
						<td><span class="label label-success">{{$disco->disponible}}</span></td>
					@else
						<td><span class="label label-default">{{$disco->disponible}}</span></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $discos->render() !!}
@endsection