@extends('admin.plantilla.principal')
@section('titulo', 'Edicion de marca')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-warning">

		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Disco duro</h3>
		</div>

		<div class="panel-body">

			{!! Form::open(['route'=>['admin.disco-duro_crud.update', $disco], 'method'=>'PUT','class'=>'form-horizontal']) !!}

				<div class="form-group">
					{!! form::label('tipo_disco','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('tipo_disco',['HHD'=>'HHD','SSD'=>'SSD'],
												$disco->tipo_disco, 
												['class'=>'form-control','required'])
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('marca_disco','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('marca_disco',['Seagate'=>'Seagate','Western Digital'=>'Western Digital','Hitachi'=>'Hitachi',
													'Samsung '=>'Samsung ','Toshiba'=>'Toshiba','Corsair'=>'Corsair','OCZ'=>'OCZ','Dell'=>'Dell'],
													$disco->marca_disco, 
													['class'=>'form-control','required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo_disco','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-9">
						{!! form::text('modelo_disco',$disco->modelo_disco,['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('capacidad_disco','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('capacidad_disco',['1 TB'=>'1 TB','80 GB'=>'80 GB','160 GB'=>'160 GB',
														'200 GB'=>'200 GB','500 GB'=>'500 GB','768 GB'=>'768 GB'],
													$disco->capacidad_disco, 
													['class'=>'form-control','required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('interface','Interface:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('interface',['SATA'=>'SATA','SATA II'=>'SATA II','SATA III'=>'SATA III','IDE'=>'IDE'],
													  $disco->interface, 
													  ['class'=>'form-control',
													  'required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('disponible','Disponible:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('disponible',['si'=>'Disponible','no'=>'No disponible'], 
													  $disco->disponible, 
													  ['class'=>'form-control'])
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('disco.duro.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>

			{!! Form::close() !!}

		</div>
	</div>

@endsection