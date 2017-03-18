@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Fuente')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	
	<div class="panel panel-primary">

		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Fuente</h3>
		</div>

		<div class="panel-body">

			{!! Form::open(['route'=>'admin.fuente_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}

				<div class="form-group @if($errors->has('marca_fuente')) has-error @endif">
					{!! form::label('marca_fuente','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('marca_fuente',['Corsair'=>'Corsair','Kanji'=>'Kanji','Sentey'=>'Sentey','PowerColor'=>'PowerColor',
														'Thermaltake'=>'Thermaltake','OCZ'=>'OCZ','Generico'=>'Generico'],
														null, 
														['class'=>'form-control','placeholder'=>'Seleccione marca...']) 
						!!}
						@if($errors->has('marca_fuente'))
							<p class="help-block">{{$errors->first('marca_fuente')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('modelo_fuente')) has-error @endif">
					{!! form::label('modelo_fuente','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('modelo_fuente',null,['class'=>'form-control','placeholder'=>'Ingrese modelo...']) !!}
						@if($errors->has('modelo_fuente'))
							<p class="help-block">{{$errors->first('modelo_fuente')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('capacidad_fuente')) has-error @endif">
					{!! form::label('capacidad_fuente','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('capacidad_fuente',['450 Watts'=>'450 Watts','500 Watts'=>'500 Watts','550 Watts'=>'550 Watts',
														  '600 Watts'=>'600 Watts','650 Watts'=>'650 Watts','700 Watts'=>'700 Watts',
														  '750 Watts'=>'750 Watts','800 Watts'=>'800 Watts'],
													    null, 
													    ['class'=>'form-control','placeholder'=>'Seleccione capacidad...']) 
						!!}
						@if($errors->has('capacidad_fuente'))
							<p class="help-block">{{$errors->first('capacidad_fuente')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('fuente.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}

		</div>
	</div>

@endsection