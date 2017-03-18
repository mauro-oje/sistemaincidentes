@extends('admin.plantilla.principal')
@section('titulo', 'Editar área')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->
	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title centro"><span class="glyphicon glyphicon-edit"></span> Editar área</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['route'=>['admin.area_crud.update',$area], 'method'=>'PUT']) !!}
					<div class="form-group">
						{!! form::label('nombre_area','Área:',['class'=>'control-label']) !!}
						{!! form::text('nombre_area',$area->nombre_area,['class'=>'form-control','required']) !!}
					</div>
					<br>
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('area.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
				{!! Form::close() !!}
			</div>
		</div>
@endsection
