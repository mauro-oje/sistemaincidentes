@extends('admin.plantilla.principal')
@section('titulo', 'Edición de Fuente')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Fuente</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.fuente_crud.update',$fuente], 'method'=>'PUT','class'=>'form-horizontal']) !!}
				<div class="form-group">
					{!! form::label('marca_fuente','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('marca_fuente',['Corsair'=>'Corsair','Kanji'=>'Kanji','Sentey'=>'Sentey','PowerColor'=>'PowerColor',
														'Thermaltake'=>'Thermaltake','OCZ'=>'OCZ','Generico'=>'Generico'],
														$fuente->marca_fuente, 
														['class'=>'form-control', 
														'required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo_fuente','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-9">
						{!! form::text('modelo_fuente',$fuente->modelo_fuente,['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('capacidad_fuente','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('capacidad_fuente',['450 Watts'=>'450 Watts','500 Watts'=>'500 Watts','550 Watts'=>'550 Watts',
													  '600 Watts'=>'600 Watts','650 Watts'=>'650 Watts','700 Watts'=>'700 Watts',
													  '750 Watts'=>'750 Watts','800 Watts'=>'800 Watts'],
													  $fuente->capacidad_fuente, 
													  ['class'=>'form-control']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('disponible','Disponible:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('disponible',['si'=>'Disponible','no'=>'No disponible'], 
													$fuente->disponible, 
													['class'=>'form-control'])
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('fuente.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection