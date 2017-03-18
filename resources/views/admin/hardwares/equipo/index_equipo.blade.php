@extends('admin.plantilla.principal')
@section('titulo','Listado de Equipos')
@section('contenido')
	<h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Equipos</h2>
	<a href="{{route('equipo.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar Equipo</a>
	{!! Form::open (['route'=>'equipo.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('nombre_equipo', null, ['class'=>'form-control', 'placeholder'=>'Buscar equipo (Ej:PC-001)...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
        <a href="{{route('equipo.index')}}" class="btn btn-default"> Listar</a>
    {!! Form::close() !!}
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	@foreach($equipos as $equipo)
		<div class="form-horizontal">
			@if($equipo)
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Usuario:</label> 
					<div class="col-sm-10">
						@if($equipo->user)
							<p class="form-control-static">{{$equipo->user->apellido}} {{$equipo->user->name}}</p>
						@else
							<p class="form-control-static">{{"Sin usuario"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Tipo:</label> 
					<div class="col-sm-10">
						<p class="form-control-static">{{$equipo->tipo}}</p>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Nombre:</label> 
					<div class="col-sm-10">
						<p class="form-control-static">{{$equipo->nombre_equipo}}</p>
					</div>
				</div>
				<div class="form-group">
					@if($equipo->placaMadre)
						<label for="" class="col-sm-2 control-label">Placa Madre:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->placaMadre->marca_placa}} {{$equipo->placaMadre->modelo_placa}}</p>
						</div>
					@else
						<label for="" class="col-sm-2 control-label">Placa Madre:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{"Sin Placa madre"}}</p>
						</div>
					@endif
				</div>
				<div class="form-group">
					@if($equipo->procesador)
						<label for="" class="col-sm-2 control-label">Microprocesador:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->procesador->marca_procesador}} {{$equipo->procesador->modelo_procesador}}</p>
						</div>
					@else
						<label for="" class="col-sm-2 control-label">Microprocesador:</label>
						<div class="col-sm-10">
							{{"Sin Microprocesador"}}
						</div>
					@endif
				</div>
				@for ($i = 0; $i < count($equipo->memoriasRam); $i++)
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Memoria ram (slot-{{$i+1}}):</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->memoriasRam[$i]->marca_memoria}} {{$equipo->memoriasRam[$i]->tipo_memoria}} {{$equipo->memoriasRam[$i]->capacidad_memoria}} {{$equipo->memoriasRam[$i]->frecuencia}}</p>
						</div>
					</div>
				@endfor
				<div class="form-group">
					@if($equipo->discosDuros)
						<label for="" class="col-sm-2 control-label">Disco:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->discosDuros->tipo_disco}} {{$equipo->discosDuros->marca_disco}} {{$equipo->discosDuros->modelo_disco}} {{$equipo->discosDuros->capacidad_disco}} {{$equipo->discosDuros->interface}}</p>
						</div>
					@else
						<label for="" class="col-sm-2 control-label">Disco:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{"Sin Disco"}}</p>
						</div>
					@endif
				</div>
				<div class="form-group">
					@if($equipo->so)
						<label for="" class="col-sm-2 control-label">Sistema Operativo:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->so}}</p>
						</div>
					@else
						<label for="" class="col-sm-2 control-label">Sistema Operativo:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{"Sin Sistema operativo"}}</p>
						</div>
					@endif
				</div>
				<div class="form-group">
					@if($equipo->ips)
						<label for="" class="col-sm-2 control-label">Dirección IP:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->ips->direccion}}</p>
						</div>
					@else
						<label for="" class="col-sm-2 control-label">Dirección IP:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{"Sin dirección IP"}}</p>
						</div>
					@endif
				</div>
				<div class="form-group">
					@if($equipo->fuente)
						<label for="" class="col-sm-2 control-label">Fuente:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{$equipo->fuente->marca_fuente}} {{$equipo->fuente->modelo_fuente}}</p>
						</div>
					@else
						<label for="" class="col-sm-2 control-label">Fuente:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{"Sin Fuente"}}</p>
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Impresora:</label>
					<div class="col-sm-10">
						@if($equipo->impresora)
							<p class="form-control-static">{{$equipo->impresora->marca_impresora}} {{$equipo->impresora->modelo_impresora}} {{$equipo->impresora->tipo_impresora}}</p>
						@else
							<p class="form-control-static">{{"Sin impresora"}}</p>
						@endif
					</div>
				</div>
				<div class="form-group">
				@if($equipo->descripcion)
					<label for="" class="col-sm-2 control-label">Descripción:</label>
					<div class="col-sm-10">
						<p class="form-control-static">{{$equipo->descripcion}}
					</div>
				@else
					<label for="" class="col-sm-2 control-label">Descripción:</label>
					<div class="col-sm-10">
						<p class="form-control-static">{{"Sin descripción"}}</p>
					</div>
				@endif
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2">
						<a href="{{route('admin.equipo_crud.edit',$equipo->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
		            	<a href="{{route('equipo.borrar',$equipo->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro que desea borrar este registro?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
		            </div>
	            </div>
	            <div class="clearfix"></div>
	            <hr>
	            <br>
			@else
				{{"No hay equipo"}}
			@endif
		</div>
	@endforeach
	{!! $equipos->render() !!}
@endsection