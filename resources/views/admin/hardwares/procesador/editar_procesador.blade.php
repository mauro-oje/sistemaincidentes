@extends('admin.plantilla.principal')
@section('titulo', 'Editar Procesador')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class=" centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Procesador</h3>
		</div>
		<div class="panel-body">

			{!! Form::open(['route'=>['admin.procesador_crud.update',$procesador], 'method'=>'PUT','class'=>'form-horizontal']) !!}

				<div class="form-group">
					{!! form::label('marca_procesador','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('marca_procesador',['AMD'=>'AMD','Intel'=>'Intel'], 
														$procesador->marca_procesador, 
														['class'=>'form-control','required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo_procesador','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('modelo_procesador',$procesador->modelo_procesador,['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('capacidad_procesador','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('capacidad_procesador',['1 Ghz'=>'1 Ghz','1.8 Ghz'=>'1.8 Ghz','1.9 Ghz'=>'1.9 Ghz','2 Ghz'=>'2 Ghz',
															'2.5 Ghz'=>'2.5 Ghz','3 Ghz'=>'3 Ghz','3.2 Ghz'=>'3.2 Ghz'], 
															$procesador->capacidad_procesador, 
															['class'=>'form-control','required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('core_procesador','Cantidad de core:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('core_procesador',['1'=>'1','2'=>'2','3'=>'3','4'=>'4','6'=>'6'], 
										$procesador->core_procesador, 
										['class'=>'form-control']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('socket_procesador','Socket:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('socket_procesador',['AM2'=>'AM2','AM2+'=>'AM2+','AM3'=>'AM3','AM3+'=>'AM3+','FM2'=>'FM2','FM2+'=>'FM2+',
															'LGA 2011'=>'LGA 2011','LGA 1150 & 1155'=>'LGA 1150 & 1155','LGA 2011-V3'=>'LGA 2011-V3',
															'LGA 1151'=>'LGA 1151'],
															$procesador->socket_procesador, 
															['class'=>'form-control']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('disponible','Disponible:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('disponible',['si'=>'Disponible','no'=>'No disponible'], 
										$procesador->disponible, 
										['class'=>'form-control']) 
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('procesador.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
				</div>
			{!! Form::close() !!}

		</div>
	</div>

@endsection