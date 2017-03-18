@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Equipo')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Equipo</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'equipo.crearPost', 'method'=>'POST','class'=>'form-horizontal']) !!}

				<div class="form-group @if($errors->has('tipo')) has-error @endif">
					{!! form::label('tipo','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo',['PC'=>'PC',
												'Notebook'   =>'Notebook',
												'Netbook'    =>'Netbook',
												'All-in-one' =>'All-in-one',
												'Tablet'     =>'Tablet'],
												null, 
												['class'=>'form-control','placeholder' =>'Seleccione tipo...','required'])
						!!}
						@if($errors->has('tipo'))
							<p class="help-block">{{$errors->first('tipo')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('nombre_equipo')) has-error @endif">
					{!! form::label('nombre_equipo','Nombre:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('nombre_equipo',null,['class'=>'form-control', 
													  'placeholder'=>'Ingrese nombre (Ej:PC-001)...','required']) 
						!!}
						@if($errors->has('nombre_equipo'))
							<p class="help-block">{{$errors->first('nombre_equipo')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Usuario</label>
					<div class="col-xs-8">
						<select name="user_id" class="form-control" required >
							<option value="">Seleccione usuario...</option>
							@foreach($usuarios as $usuario)
								<option value="{{$usuario->id}}">{{$usuario->apellido.' '.$usuario->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Placa madre</label>
					<div class="col-xs-8">
						<select name="id_placa" class="form-control" required>
							<option value="">Seleccione placa madre...</option>
							@foreach($placas as $placa)
								<option value="{{$placa->id}}">{{ $placa->marca_placa.' - '.$placa->modelo_placa }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Procesador</label>
					<div class="col-xs-8">
						<select name="id_procesador" class="form-control" required>
							<option value="">Seleccione procesador...</option>
							@foreach($procesadores as $procesador)
								<option value="{{ $procesador->id }}">{{ $procesador->marca_procesador.' - '.$procesador->modelo_procesador.' - '.$procesador->capacidad_procesador}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group" id="mem">
					<label class="col-sm-2 control-label">Memoria (slot-1)</label>
					<div class="col-xs-8">
						<select id="id_memoria" name="id_memoria" class="form-control" required>
							<option value="">Seleccione memoria...</option>
							@foreach($memorias as $memoria)
								<option value="{{$memoria->id}}">{{ $memoria->tipo_memoria.' - '.$memoria->marca_memoria.' - '.$memoria->capacidad_memoria.' - '.$memoria->frecuencia}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group hide" id="mem2">
					<!-- aca se carga la segunda memoria -->
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Disco</label>
					<div class="col-xs-8">
						<select name="id_disco" class="form-control" required>
							<option value="">Seleccione placa disco...</option>
							@foreach($discos as $disco)
								<option value="{{$disco->id}}">{{ $disco->marca_disco.' - '.$disco->capacidad_disco.' - '.$disco->interface}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('so')) has-error @endif">
					{!! form::label('so','Sistema Operativo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('so',['Windows XP 32-bit'=>'Windows XP 32-bit',
												'Windows 7 Pro 32-bit'=>'Windows 7 Pro 32-bit',
												'Windows 7 Pro 64-bit'=>'Windows 7 Pro 64-bit',
												'Windows 8.1 Pro 32-bit'=>'Windows 8.1 Pro 32-bit',
												'Windows 8.1 Pro 64-bit'=>'Windows 8.1 Pro 64-bit',
												'Windows 10 Pro 32-bit'=>'Windows 10 Pro 32-bit',
												'Windows 10 Pro 64-bit'=>'Windows 10 Pro 64-bit',
												'Linux Ubuntu 16.0.2'=>'Linux Ubuntu 16.0.2',
												'Android'=>'Android'],
											null, 
											['class'=>'form-control', 
											'placeholder'=>'Seleccione sistema operativo...','required']) 
						!!}
						@if($errors->has('so'))
							<p class="help-block">{{$errors->first('so')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Ip</label>
					<div class="col-xs-8">
						<select name="id_ip" class="form-control" required>
							<option value="">Seleccione IP...</option>
							@foreach($ips as $ip)
									<option value="{{$ip->id}}">{{ $ip->direccion }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fuente</label>
					<div class="col-xs-8">
						<select name="id_fuente" class="form-control" required>
							<option value="">Seleccione fuente...</option>
							@foreach($fuentes as $fuente)
								<option value="{{$fuente->id}}">{{ $fuente->marca_fuente.' - '.$fuente->modelo_fuente.' - '.$fuente->capacidad_fuente}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Impresora</label>
					<div class="col-xs-8">
						<select name="id_impresora" class="form-control">
							<option value="null">Seleccione impresora...</option>
							@foreach($impresoras as $impresora)
								<option value="{{$impresora->id}}">{{ $impresora->marca_impresora.' - '.$impresora->modelo_impresora.' - '.$impresora->tipo_impresora}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('descripcion','Descripción adicional:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::textarea('descripcion',null,['class'=>'form-control','rows'=>'5', 
															'placeholder'=>'Ingrese alguna descripcion adiciona...']) 
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('equipo.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	<script>
		$('#id_memoria').change(function(){
			var id_memoria = $(this).val();
			$.get('cargar_memoria', {id_memoria: id_memoria}, function(html){
				$("#mem2").html(html);
				$("#mem2").removeClass("hide");
			});
		});
	</script>
@endsection