@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Disco duro')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->
	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class=" centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Disco duro</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'admin.disco-duro_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}

				<div class="form-group @if($errors->has('tipo_disco')) has-error @endif">
					{!! form::label('tipo_disco','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo_disco',['HHD'=>'HHD','SSD'=>'SSD'],
												null, 
												['class'=>'form-control','placeholder' =>'Seleccione tipo...'])
						!!}
						@if($errors->has('tipo_disco'))
							<p class="help-block">{{$errors->first('tipo_disco')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group   @if($errors->has('marca_disco')) has-error @endif">
					{!! form::label('marca_disco','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('marca_disco',['Seagate'=>'Seagate','Western Digital'=>'Western Digital','Hitachi'=>'Hitachi',
												  'Samsung '=>'Samsung ','Toshiba'=>'Toshiba','Corsair'=>'Corsair','OCZ'=>'OCZ',
												  'Dell'=>'Dell'],
												  null, 
												  ['class'=>'form-control','placeholder'=>'Seleccione marca...']) 
						!!}
						@if($errors->has('marca_disco'))
							<p class="help-block">{{$errors->first('marca_disco')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo_disco','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('modelo_disco',null,['class'=>'form-control','placeholder'=>'Ingrese el modelo...']) !!}
					</div>
				</div>
				<br>
				<div class="form-group  @if($errors->has('capacidad_disco')) has-error @endif">
					{!! form::label('capacidad_disco','Capacidad:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('capacidad_disco',['1 TB'=>'1 TB','80 GB'=>'80 GB','160 GB'=>'160 GB',
														'200 GB'=>'200 GB','500 GB'=>'500 GB','768 GB'=>'768 GB'],
													null, 
													['class'=>'form-control','placeholder'=>'Seleccione la capacidad...']) 
						!!}
						@if($errors->has('capacidad_disco'))
							<p class="help-block">{{$errors->first('capacidad_disco')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('interface')) has-error @endif">
					{!! form::label('interface','Interface:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('interface',['SATA'=>'SATA','SATA II'=>'SATA II','SATA III'=>'SATA III','IDE'=>'IDE'],
													null, 
													['class'=>'form-control','placeholder'=>'Seleccione la capacidad...']) 
						!!}
						@if($errors->has('interface'))
							<p class="help-block">{{$errors->first('interface')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('disco.duro.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection