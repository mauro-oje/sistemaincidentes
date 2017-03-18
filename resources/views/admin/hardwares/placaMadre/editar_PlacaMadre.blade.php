@extends('admin.plantilla.principal')
@section('titulo', 'Editar Placa madre')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->
	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Placa madre</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.placa_madre_crud.update',$placa_madre], 'method'=>'PUT','class'=>'form-horizontal']) !!}
				<div class="form-group @if($errors->has('marca_placa')) has-error @endif">
					{!! form::label('marca','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('marca_placa',$placa_madre->marca_placa,['class'=>'form-control']) !!}
						@if($errors->has('marca_placa'))
							<p class="help-block">{{$errors->first('marca_placa')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('modelo_placa',$placa_madre->modelo_placa,['class'=>'form-control','required']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('version','Version:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('version',$placa_madre->version,['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('disponible','Disponible:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-sm-8">
						{!! form::select('disponible',['si'=>'Disponible','no'=>'No disponible'],$placa_madre->disponible, ['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('placa.madre.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection