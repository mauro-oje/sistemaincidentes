@extends('admin.plantilla.principal')
@section('titulo', 'Edicion de marca')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Memoria ram</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.memoria_ram_crud.update', $memoria], 'method'=>'PUT','class'=>'form-horizontal']) !!}
				<div class="form-group">
					{!! form::label('tipo_memoria','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('tipo_memoria',['DDR1'=>'DDR1','DDR2'=>'DDR2',
														'DDR3'=>'DDR3','DDR4'=>'DDR4'],
														$memoria->tipo_memoria, 
														['class'      =>'form-control', 
														'required'])
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('marca_memoria','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('marca_memoria',['Kingston'=>'Kingston','Gskill'=>'Gskill','Crucial'=>'Crucial',
														'Corsair'=>'Corsair','Novatech'=>'Novatech','Samsung'=>'Samsung',
														'OCZ'=>'OCZ','AVANT Titan memory'=>'AVANT Titan memory'],
														$memoria->marca_memoria, 
														['class'=>'form-control',
														'required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('capacidad_memoria','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('capacidad_memoria',['1 GB'=>'1 GB','2 GB'=>'2 GB','4 GB'=>'4 GB',
															'8 GB'=>'8 GB','256 MB'=>'256 MB','512 MB'=>'512 MB'],
															$memoria->capacidad_memoria, 
															['class'=>'form-control',
															'required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('frecuencia','Frecuencia:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('frecuencia',['666-Mhz'=>'666-Mhz','800-Mhz'=>'800-Mhz','1333-Mhz'=>'1333-Mhz',
													   '1066-Mhz'=>'1066-Mhz','1600-Mhz'=>'1600-Mhz'],
													    $memoria->frecuencia, 
													    ['class'=>'form-control',
													    'required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('disponible','Disponible:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('disponible',['si'=>'Disponible',
													   'no'=>'No disponible'], 
													  $memoria->disponible, 
													  ['class'=>'form-control',])
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('memoria.ram.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection