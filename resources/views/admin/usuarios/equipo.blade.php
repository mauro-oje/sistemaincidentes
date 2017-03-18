@extends('admin.plantilla.principal')
@section('titulo','Equipo')
@section('contenido')

	<h2 class="text-center"><i class="fa fa-laptop" aria-hidden="true"></i> Equipo asignado</h2>
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	
	<div class="form-horizontal">
		@if($equipo)
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Usuario:</label> 
				<div class="col-sm-10">
					@if($usuario)
						<p class="form-control-static">{{$usuario->name}} {{$usuario->apellido}}</p>
					@else
						<p class="form-control-static">{{"Sin usuario"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Tipo:</label> 
				<div class="col-sm-10">
					@if($equipo->tipo)
						<p class="form-control-static">{{$equipo->tipo}}</p>
					@else
						<p class="form-control-static">{{"Sin tipo"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Nombre:</label> 
				<div class="col-sm-10">
					@if($equipo->nombre_equipo)
						<p class="form-control-static">{{$equipo->nombre_equipo}}</p>
					@else
						<p class="form-control-static">{{"Sin nombre"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Placa Madre:</label>
				<div class="col-sm-10">
					@if($equipo->placaMadre)
						<p class="form-control-static">{{$equipo->placaMadre->marca_placa}} {{$equipo->placaMadre->modelo_placa}}</p>
					@else
						<p class="form-control-static">{{"Sin Placa madre"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">
					<label for="" class="col-sm-2 control-label">Microprocesador:</label>
					<div class="col-sm-10">
						@if($equipo->procesador)
							<p class="form-control-static">{{$equipo->procesador->marca_procesador}} {{$equipo->procesador->modelo_procesador}}</p>
						@else
							<p class="form-control-static">{{"Sin Procesador"}}</p>
						@endif
					</div>
			</div>
			@for ($i = 0; $i < count($equipo->memoriasRam); $i++)
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Memoria ram (slot-{{$i+1}}):</label>
					<div class="col-sm-10">
						<p class="form-control-static">{{$equipo->memoriasRam[$i]->marca_memoria}} {{$equipo->memoriasRam[$i]->tipo_memoria}} {{$equipo->memoriasRam[$i]->frecuencia}}</p>
					</div>
				</div>
			@endfor
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Disco duro:</label>
				<div class="col-sm-10">
					@if($equipo->discosDuros)
						<p class="form-control-static">{{$equipo->discosDuros->tipo_disco}} {{$equipo->discosDuros->marca_disco}} {{$equipo->discosDuros->modelo_disco}} {{$equipo->discosDuros->capacidad_disco}} {{$equipo->discosDuros->interface}}</p>
					@else
						<p class="form-control-static">{{"Sin Disco duro"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">	
				<label for="" class="col-sm-2 control-label">Sistema Operativo:</label>
				<div class="col-sm-10">
					@if($equipo->so)
						<p class="form-control-static">{{$equipo->so}}</p>
					@else
						<p class="form-control-static">{{"Sin Sistema operativo"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Dirección IP:</label>
				<div class="col-sm-10">
					@if($equipo->ips)
						<p class="form-control-static">{{$equipo->ips->direccion}}</p>
					@else
						<p class="form-control-static">{{"Sin dirección IP"}}</p>
					@endif
				</div>
			</div>
			<div class="form-group">
				
					<label for="" class="col-sm-2 control-label">Fuente:</label>
					<div class="col-sm-10">
						@if($equipo->fuente)
							<p class="form-control-static">{{$equipo->fuente->marca_fuente}} {{$equipo->fuente->modelo_fuente}}</p>
						@else
							<p class="form-control-static">{{"Sin Fuente"}}</p>
						@endif
					</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Impresora:</label>
				<div class="col-sm-10">
					@if($equipo->impresora)
						<p class="form-control-static">{{$equipo->impresora->marca_impresora}} {{$equipo->impresora->modelo_impresora}} {{$equipo->impresora->tipo_impresora}}</p>
					@else
						<p class="form-control-static"><span class="label label-default label-md">{{"Sin impresora"}}</span></p>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Descripción:</label>
				<div class="col-sm-10">
					@if($equipo->descripcion)
						<p class="form-control-static">{{$equipo->descripcion}}
					@else
						<p class="form-control-static">{{"Sin impresora"}}</p>
					@endif
				</div>
			<div class="form-group">
				<div class="col-sm-2 col-sm-offset-2">
					@if(Auth::user()->tipo == "admin")
						<a href="{{route('usuario.listar')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
					@elseif(Auth::user()->tipo == "tecnicoHS")
						<a href="{{route('usuario.listar.tecnicohs')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
					@else
						<a href="{{route('usuario.listar.tecnicori')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
					@endif
	            </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <br>
		@else
			{{"No hay equipo"}}
		@endif
	</div>

@endsection