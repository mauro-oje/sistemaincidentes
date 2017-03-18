@extends('admin.plantilla.principal')
@section('titulo','Listado Placas madres')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Placas madres</h2>
	<!-- Formulario para el buscador de Tags-->
    {!! Form::open (['route'=>'placa.madre.index.hs', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('marca_placa', null, ['class'=>'form-control', 'placeholder'=>'Buscar placa...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('placa.madre.index.hs')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
    <!-- Fin Formulario para el buscador de Tags-->
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<table class="table table-striped">
		<thead><div></div>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Version</th>
			<th>¿Disponible?</th>
		</thead>
		<tbody>
			@foreach($placas_madres as $placa)
				<tr>
					<td>{{$placa->marca_placa}}</td>
					@if($placa->modelo_placa)
						<td>{{$placa->modelo_placa}}</td>
					@else
						<td>{{"Sin modelo"}}</td>
					@endif
					@if($placa->version)
						<td>{{$placa->version}}</td>
					@else
						<td>{{'Sin version'}}</td>
					@endif
					@if($placa->disponible == "si")
						<td><span class="label label-success">{{$placa->disponible}}</span></td>
					@else
						<td><span class="label label-default">{{$placa->disponible}}</span></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="modal fade" id="editar_modal_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content" id="editar_modal"></div>
	    </div>
	</div>
	{!! $placas_madres->render() !!}
@endsection