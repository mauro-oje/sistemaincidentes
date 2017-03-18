@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Oficina')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->
	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar oficina</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'admin.oficina_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}
				<div class="form-group @if($errors->has('oficina')) has-error @endif">
					{!! form::label('oficina','Oficina:',['class'=>'col-sm-1 control-label','for'=>'inputEmail3']) !!}
					<div class="col-sm-10">
						{!! form::text('oficina',null,['class'=>'form-control','placeholder'=>'Ingrese la oficina (Ej: Oficina 1)...']) !!}
						@if($errors->has('oficina'))
							<p class="help-block">{{$errors->first('oficina')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-1 control-label">Área</label>
					<div class="col-md-5">
						<select name="area_id" class="form-control" required>
							<option value="#">Seleccione un área...</option>
							@foreach($areas as $area)
								<option value="{{$area->id}}">{{$area->nombre_area}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-3">
						<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
						<a href="{{route('oficina.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
