@extends('admin.plantilla.principal')
@section('titulo', 'Edición Equipo')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class=" centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Equipo</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.equipo_crud.update',$equipo], 'method'=>'PUT','class'=>'form-horizontal']) !!}

				<div class="form-group">
					{!! form::label('tipo','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo',['PC'=>'PC','Notebook'=>'Notebook','Netbook'=>'Netbook',
												 'All-in-one'=>'All-in-one','Tablet'=>'Tablet'],
												$equipo->tipo, 
												['class'=>'form-control'])
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('nombre','Nombre:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('nombre_equipo',$equipo->nombre_equipo,['class'=>'form-control'])!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Usuario:</label>
					<div class="col-xs-8">
						<select name="user_id" class="form-control" required>
							@if($equipo->user)
								<option value="{{$equipo->user->id}}">{{$equipo->user->apellido.' '.$equipo->user->name}}</option>
							@else
								<option value="null">Seleccione usuario...</option>
							@endif
							@foreach($usuarios as $usuario)
								<option value="{{ $usuario->id }}">{{$usuario->apellido.' '.$usuario->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Placa madre:</label>
					<div class="col-xs-8">
						<select name="id_placa" class="form-control" required>
							<option value="{{ $equipo->placaMadre->id }}">{{$equipo->placaMadre->id.' - '.$equipo->placaMadre->marca_placa.' '.$equipo->placaMadre->modelo_placa}}</option>
							@foreach($placas as $placa)
								@if($placa->disponible == "si")
									<option value="{{$placa->id}}">{{ $placa->id.' - '.$placa->marca_placa.' - '.$placa->modelo_placa }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Procesador:</label>
					<div class="col-xs-8">
						<select name="id_procesador" class="form-control" required>
							<option value="{{ $equipo->procesador->id }}">{{$equipo->procesador->id.' - '.$equipo->procesador->marca_procesador.' - '.$equipo->procesador->capacidad_procesador.' - '.$equipo->procesador->socket_procesador}}</option>
							@foreach($procesadores as $procesador)
								@if($procesador->disponible == "si")
									<option value="{{ $procesador->id }}">{{$procesador->id.' - '.$procesador->marca_procesador.' - '.$procesador->capacidad_procesador.' - '.$procesador->socket_procesador}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group" id="mem">
					<label class="col-sm-2 control-label">Memoria (slot-1)</label>
					<div class="col-xs-8">
						<select id="id_memoria" name="id_memoria" class="form-control" required>
							<option value="{{$consulta_memoria[0]->id}}">{{$consulta_memoria[0]->tipo_memoria.' - '.$consulta_memoria[0]->marca_memoria.' - '.$consulta_memoria[0]->capacidad_memoria.' - '.$consulta_memoria[0]->frecuencia}}</option>
							@foreach($memorias as $memoria)
								<option value="{{$memoria->id}}">{{ $memoria->tipo_memoria.' - '.$memoria->marca_memoria.' - '.$memoria->capacidad_memoria.' - '.$memoria->frecuencia}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group" id="mem2">
					<label class="col-sm-2 control-label">Memoria (slot-2)</label>
					<div class="col-xs-8">
						<select name="id_memoria2" class="form-control" required>
							@if(empty($consulta_memoria[1]))
								<option value="null">Seleccione memoria...</option>
							@else
								<option value="{{$consulta_memoria[1]->id}}">{{$consulta_memoria[1]->tipo_memoria.' - '.$consulta_memoria[1]->marca_memoria.' - '.$consulta_memoria[1]->capacidad_memoria.' - '.$consulta_memoria[1]->frecuencia}}</option>
							@endif
							@foreach($memorias as $memoria)
								@if($memoria->disponible == "si")
									<option value="{{$memoria->id}}">{{ $memoria->tipo_memoria.' - '.$memoria->marca_memoria.' - '.$memoria->capacidad_memoria.' - '.$memoria->frecuencia}}</option>
								@endif
							@endforeach
							<option value="null">Sin memoria</option>
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Disco:</label>
					<div class="col-xs-8">
						<select name="id_disco" class="form-control" required>
							<option value="{{ $consulta_disco->id }}">{{$consulta_disco->id.' - '.$consulta_disco->marca_disco.' '.$consulta_disco->capacidad_disco.' '.$consulta_disco->interface}}</option>
							@foreach($discos as $disco)
								@if($disco->disponible == "si")
									<option value="{{$disco->id}}">{{ $disco->id.' - '.$disco->marca_disco.' - '.$disco->capacidad_disco.' - '.$disco->interface}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('so','Sistema Operativo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('so',['Windows XP 32-bit'=>'Windows XP 32-bit',
												'Windows 7 32-bit'=>'Windows 7 32-bit',
												'Windows 7 64-bit'=>'Windows 7 64-bit',
												'Windows 8 32-bit'=>'Windows 8 32-bit',
												'Windows 8 64-bit'=>'Windows 8 64-bit',
												'Windows 8.1 32-bit'=>'Windows 8.1 32-bit',
												'Windows 8.1 64-bit'=>'Windows 8.1 64-bit',
												'Windows 10 64-bit'=>'Windows 10 64-bit',
												'Linux Ubuntu 16.0.2'=>'Linux Ubuntu 16.0.2'],
												$equipo->so, 
												['class'=>'form-control']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Ip:</label>
					<div class="col-xs-8">
						<select name="id_ip" class="form-control" required>
							<option value="{{$consulta_ip->id}}">{{$consulta_ip->direccion}}</option>
							@foreach($ips as $ip)
								@if($ip->disponible == "si")
									<option value="{{$ip->id}}">{{ $ip->direccion }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fuente:</label>
					<div class="col-xs-8">
						<select name="id_fuente" class="form-control" required>
							<option value="{{ $equipo->fuente->id }}">{{$equipo->fuente->id.' - '.$equipo->fuente->marca_fuente.' '.$equipo->fuente->modelo_fuente.' '.$equipo->fuente->capacidad_fuente}}</option>
							@foreach($fuentes as $fuente)
								@if($fuente->disponible == "si")
									<option value="{{$fuente->id}}">{{ $fuente->id.' - '.$fuente->marca_fuente.' - '.$fuente->modelo_fuente.' - '.$fuente->capacidad_fuente}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Impresora:</label>
					<div class="col-xs-8">
						<select name="id_impresora" class="form-control" required>
							@if($consulta_impresora)
								<option value="{{$consulta_impresora->id}}">{{$consulta_impresora->id.' - '.$consulta_impresora->marca_impresora.' '.$consulta_impresora->modelo_impresora.' '.$consulta_impresora->tipo_impresora}}</option>
								@foreach($impresoras as $impresora)
									@if($impresora->disponible == "si")
										<option value="{{$impresora->id}}">{{ $impresora->id.' - '.$impresora->marca_impresora.' - '.$impresora->modelo_impresora.' - '.$impresora->tipo_impresora }}</option>
									@endif
								@endforeach
							@else
								<option value="null">Seleccione impresora...</option>
								@foreach($impresoras as $impresora)
									@if($impresora->disponible == "si")
										<option value="{{$impresora->id}}">{{ $impresora->id.' - '.$impresora->marca_impresora.' - '.$impresora->modelo_impresora.' - '.$impresora->tipo_impresora }}</option>
									@endif
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('descripcion','Descripción adicional:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::textarea('descripcion',$equipo->descripcion,['class'=>'form-control','rows'=>'5']) 
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('equipo.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection