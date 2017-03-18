@extends('admin.plantilla.principal')
@section('titulo','Mi equipo')
@section('contenido')

	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	
	<h3 class="centro"><i class="fa fa-laptop" aria-hidden="true"></i> Mi equipo</h3>
	<hr>
	<div class="form-horizontal">
		@if($equipo)
			@foreach($equipo as $e)
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Tipo:</label> 
					<div class="col-sm-10">
						@if($e->tipo)
							<p class="form-control-static">{{$e->tipo}}</p>
						@else
							<p class="form-control-static">{{"Sin tipo"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Nombre:</label> 
					<div class="col-sm-10">
						@if($e->tipo)
							<p class="form-control-static">{{$e->nombre_equipo}}</p>
						@else
							<p class="form-control-static">{{"Sin nombre"}}</p>
						@endif
						
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Placa Madre:</label>
					<div class="col-sm-10">
						@if($e->placaMadre)
							<p class="form-control-static">{{$e->placaMadre->marca_placa}} {{$e->placaMadre->modelo_placa}}</p>
						@else
							<p class="form-control-static">{{"Sin Placa madre"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Microprocesador:</label>
					<div class="col-sm-10">
						@if($e->procesador)
							<p class="form-control-static">{{$e->procesador->marca_procesador}} {{$e->procesador->modelo_procesador}}</p>
						@else
							<p class="form-control-static">{{"Sin procesador"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					@for ($i = 0; $i < count($e->memoriasRam); $i++)
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Memoria ram (slot-{{$i+1}}):</label>
							<div class="col-sm-10">
								<p class="form-control-static">{{$e->memoriasRam[$i]->marca_memoria}} {{$e->memoriasRam[$i]->tipo_memoria}} {{$e->memoriasRam[$i]->frecuencia}}</p>
							</div>
						</div>
					@endfor
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Disco duro:</label>
					<div class="col-sm-10">
						@if($e->discosDuros)
							<p class="form-control-static">{{$e->discosDuros->tipo_disco}} {{$e->discosDuros->marca_disco}} {{$e->discosDuros->modelo_disco}} {{$e->discosDuros->capacidad_disco}} {{$e->discosDuros->interface}}</p>
						@else
							<p class="form-control-static">{{"Sin Disco duro"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Sistema Operativo:</label>
					<div class="col-sm-10">
						@if($e->so)
							<p class="form-control-static">{{$e->so}}</p>
						@else
						<p class="form-control-static">{{"Sin Sistema operativo"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Dirección IP:</label>
					<div class="col-sm-10">
						@if($e->ips)
							<p class="form-control-static">{{$e->ips->direccion}}</p>
						@else
							<p class="form-control-static">{{"Sin dirección IP"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Fuente:</label>
					<div class="col-sm-10">
						@if($e->fuente)
							<p class="form-control-static">{{$e->fuente->marca_fuente}} {{$e->fuente->modelo_fuente}}</p>
						@else
						<p class="form-control-static">{{"Sin Fuente"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Impresora:</label>
					<div class="col-sm-10">
						@if($e->impresora)
							<p class="form-control-static">{{$e->impresora->marca_impresora}} {{$e->impresora->modelo_impresora}} {{$e->impresora->tipo_impresora}}</p>
						@else
							<p class="form-control-static"><span class="label label-default label-md">{{"Sin impresora"}}</span></p>
						@endif
					</div>
				</div>
			@endforeach
			<hr>
		@else
			<p>No hay equipo asignado para éste usuario</p>
		@endif
	</div>

@endsection