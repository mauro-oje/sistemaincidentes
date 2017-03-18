@extends('admin.plantilla.principal')
@section('Registrar incidente')
@section('contenido')
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Incidente</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'incidente.incidente_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}
				<div class="form-group @if($errors->has('tipo_incidente')) has-error @endif">
					{!! form::label('tipo','Tipo de incidente:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo_incidente',['tecnicoHS'=>'Hardware-Software',
														   'tecnicoRI'=>'Red-Internet',
														   'admin'=>'Sistema-Consulta'], 
															null,['class'=>'form-control',
															'placeholder'=>'Seleccione el tipo incidente'])
						!!}
						@if($errors->has('tipo_incidente'))
							<p class="help-block">{{$errors->first('tipo_incidente')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('prioridad')) has-error @endif">
					{!! form::label('prioridad','Prioridad:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('prioridad',['Alta'=>'Alta','Media'=>'Media','Baja'=>'Baja'], 
							null,['class'=>'form-control','placeholder'=>'Seleccione prioridad']) !!}
						@if($errors->has('prioridad'))
							<p class="help-block">{{$errors->first('prioridad')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('descripcion_incidente','Descripción incidente:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::textarea('descripcion_incidente',null,['class'=>'form-control','rows'=>'7', 
																'placeholder'=>'Descripcion incidente...']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
						<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
						@if(Auth::user()->tipo == "miembro")
							<a href="{{route('incidente.listado.miembros')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
						@else
							<a href="{{route('incidente.listado.tecnico')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
						@endif
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>	
@endsection
