@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Memoria')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	
	<div class="panel panel-primary">

		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Memoria RAM</h3>
		</div>

		<div class="panel-body">

			{!! Form::open(['route'=>'admin.memoria_ram_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}

				<div class="form-group @if($errors->has('tipo_memoria')) has-error @endif">
					{!! form::label('tipo_memoria','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo_memoria',['DDR1'=>'DDR1',
														'DDR2'=>'DDR2',
														'DDR3'=>'DDR3',
														'DDR4'=>'DDR4'],
												null, 
												['class'=>'form-control','placeholder'=>'Seleccione tipo memoria...'])
						!!}
						@if($errors->has('tipo_memoria'))
							<p class="help-block">{{$errors->first('tipo_memoria')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('marca_memoria')) has-error @endif">
					{!! form::label('marca_memoria','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('marca_memoria',['Kingston'=>'Kingston',
														'Gskill'=>'Gskill',
														'Crucial'=>'Crucial',
														'Corsair'=>'Corsair',
														'Novatech'=>'Novatech',
														'Samsung'=>'Samsung',
														'OCZ'=>'OCZ',
														'AVANT Titan memory'=>'AVANT Titan memory'],
														null, 
														['class'=>'form-control','placeholder'=>'Seleccione marca...']) 
						!!}
						@if($errors->has('marca_memoria'))
							<p class="help-block">{{$errors->first('marca_memoria')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('capacidad_memoria')) has-error @endif">
					{!! form::label('capacidad_memoria','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('capacidad_memoria',['1 GB'=>'1 GB',
															'2 GB'=>'2 GB',
															'4 GB'=>'4 GB',
															'8 GB'=>'8 GB',
															'256 MB'=>'256 MB',
															'512 MB'=>'512 MB'],
													null, 
													['class'=>'form-control','placeholder'=>'Seleccione capacidad...']) 
						!!}
						@if($errors->has('capacidad_memoria'))
							<p class="help-block">{{$errors->first('capacidad_memoria')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('frecuencia','Frecuencia:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('frecuencia',['667-MHz'=>'667-MHz',
														'800-MHz'=>'800-MHz',
														'1333-MHz'=>'1333-MHz',
													   	'1066-MHz'=>'1066-MHz',
													   	'1600-MHz'=>'1600-MHz',
													   	'2133-MHz'=>'2133-MHz',
													   	'2400-MHz'=>'2400-MHz'],
													    null, 
													    ['class'=>'form-control','placeholder'=>'Seleccione frecuencia...']) 
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('memoria.ram.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}

		</div>
	</div>

@endsection