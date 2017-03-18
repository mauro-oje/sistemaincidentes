@extends('admin.plantilla.principal')
@section('titulo', 'Resgistrar área')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
		<div class=" panel panel-primary">
			<div class="panel-heading">
				<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Área</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['route'=>'admin.area_crud.store','method'=>'POST','role'=>'form']) !!}
					<div class="form-group @if($errors->has('nombre_area')) has-error @endif">
						{!! form::label('area','Área:',['class'=>'control-label','for'=>'inputName']) !!}
						<br>
						{!! form::text('nombre_area',null,['class'=>'form-control','placeholder'=>'Ingrese el área...']) !!}
						@if($errors->has('nombre_area'))
							<p class="help-block">{{$errors->first('nombre_area')}}</p> 
						@endif
					</div>
					<br>
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('area.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
				{!! Form::close() !!}
			</div>
		</div>
@endsection

