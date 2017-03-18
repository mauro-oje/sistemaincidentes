@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Placa Madre')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Placa madre</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'admin.placa_madre_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}

				<div class="form-group @if($errors->has('marca_placa')) has-error @endif">
					{!! form::label('marca_placa','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('marca_placa',['Asus'=>'Asus','Asrock'=>'Asrock','Gigabyte'=>'Gigabyte','MSI'=>'MSI',
														'Intel'=>'Intel','PC Chips'=>'PC Chips','Zotac'=>'Zotac'], 
														null, 
														['class'=>'form-control','placeholder'=>'Seleccione marca..']) 
						!!}
						@if($errors->has('marca_placa'))
							<p class="help-block">{{$errors->first('marca_placa')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo_placa','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('modelo_placa',null,['class'=>'form-control','placeholder'=>'Ingrese modelo...']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('version','Version (REV):',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('version',['1'=>'1','1.0'=>'1.0','1.2'=>'1.2','2.0'=>'2.0',
														'2.1'=>'2.1','2.2'=>'2.2','2.3'=>'2.3'], 
														null, 
														['class'=>'form-control','placeholder'=>'Seleccione versión..']) 
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('placa.madre.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection