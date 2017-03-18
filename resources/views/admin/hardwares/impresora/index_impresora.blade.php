@extends('admin.plantilla.principal')
@section('titulo','Listado de Impresoras')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Impresoras</h2>
	<a href="{{route('impresora.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar impresora</a>
	{!! Form::open (['route'=>'impresora.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('marca_impresora', null, ['class'=>'form-control', 'placeholder'=>'Buscar marca...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('impresora.index')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Tipo</th>
			<th>Dirección IP</th>
			<th>¿Disponible?</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($impresoras as $impresora)
				<tr>
					<td>{{$impresora->marca_impresora}}</td>
					@if($impresora->modelo_impresora)
						<td>{{$impresora->modelo_impresora}}</td>
					@else
						<td><span class="label label-default">{{'Sin modelo'}}</span></td>
					@endif
					@if($impresora->tipo_impresora)
						<td>{{$impresora->tipo_impresora}}</td>
					@else
						<td><span class="label label-default">{{'Sin tipo'}}</span></td>
					@endif
					@if($impresora->ip)
						<td>{{$impresora->ip->direccion}}</td>
					@else
						<td><span class="label label-default">{{"Sin direccion IP"}}</span></td>
					@endif
					@if($impresora->disponible == "si")
						<td><span class="label label-success">{{$impresora->disponible}}</span></td>
					@else
						<td><span class="label label-default">{{$impresora->disponible}}</span></td>
					@endif
					<td>
						<a href="{{route('admin.impresora_crud.edit',$impresora->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
						<a href="{{route('impresora.borrar',$impresora->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro que desea borrar este registro?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $impresoras->render() !!}
@endsection
