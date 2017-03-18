@extends('admin.plantilla.principal')
@section('titulo','Listado de fuentes')
@section('contenido')

	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Fuentes</h2>
	<a href="{{route('fuente.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar fuente</a>
	{!! Form::open (['route'=>'fuente.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('marca_fuente', null, ['class'=>'form-control', 'placeholder'=>'Buscar marca...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('fuente.index')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	
	<table class="table table-striped">
		<thead>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Capacidad</th>
			<th>¿Disponible?</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($fuentes as $fuente)
				<tr>
					<td>{{$fuente->marca_fuente}}</td>
					<td>{{$fuente->modelo_fuente}}</td>
					<td>{{$fuente->capacidad_fuente}}</td>
					@if($fuente->disponible == "si")
						<td><span class="label label-success">{{$fuente->disponible}}</span></td>
					@else
						<td><span class="label label-default">{{$fuente->disponible}}</span></td>
					@endif
					<td>
						<a href="{{route('admin.fuente_crud.edit',$fuente->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
						<a href="{{route('fuente.borrar',$fuente->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro que desea borrar este registro?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $fuentes->render() !!}
@endsection
