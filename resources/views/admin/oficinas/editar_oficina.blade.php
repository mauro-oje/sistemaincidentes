@extends('admin.plantilla.principal')
@section('titulo', 'Editar Oficina')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->
	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title centro"><span class="glyphicon glyphicon-edit"></span> Editar oficina</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.oficina_crud.update',$oficina,$areas], 'method'=>'PUT','class'=>'form-horizontal']) !!}
				<div class="form-group">
						{!! form::label('oficina','Oficina:',['class'=>'col-sm-2 control-label','for'=>'inputEmail3']) !!}
						<div class="col-sm-10">
							{!! form::text('oficina',$oficina->oficina,['class'=>'form-control','required']) !!}
						</div>
					</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Área</label>
					<div class="col-xs-12 col-md-7">
						<select name="area_id" class="form-control" required>
							@if($oficina->area)
								<option value="{{$oficina->area->id}}">{{ $oficina->area->nombre_area }}</option>
							@else
								<option value="null">Seleccione área...</option>
							@endif
							@foreach($areas as $area)
								<option value="{{$area->id}}">{{ $area->nombre_area }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
				<a href="{{route('oficina.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
