@extends('admin.plantilla.principal')
@section('titulo','Cambiar contraseña')
@section('contenido')

	<div class="panel panel-primary">

		<div class="panel-heading">
			<h3 class="centro panel-title"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Cambiar contraseña</h3>
		</div>

		<div class="panel-body">
			{!! Form::open (['route'=>'cambiarPassword','method'=>'POST','class'=>'form-horizontal']) !!}
			
			    <div class="form-group @if($errors->has('password')) has-error @endif">
			    	{!! form::label('password','Contraseña actual:',['class'=>'col-xs-2 control-label','for'=>'inputName']) !!}
			    	<div class="col-xs-7">
			        	{!! form::password('password',['class'=>'form-control','placeholder'=>'Introducir contraseña anterior...']) !!}
			        	@if($errors->has('password'))
							<p class="help-block">{{$errors->first('password')}}</p> 
						@endif
			        </div>
			    </div>
			    <br>
			    <div class="form-group @if($errors->has('password_nuevo')) has-error @endif">
			    	{!! form::label('password_nuevo','Contraseña nueva:',['class'=>'col-xs-2 control-label','for'=>'inputName']) !!}
			    		<div class="col-xs-7">
			        {!! form::password('password_nuevo',['class'=>'form-control','placeholder'=>'Introducir contraseña nueva...']) !!}
			        @if($errors->has('password_nuevo'))
							<p class="help-block">{{$errors->first('password_nuevo')}}</p> 
					@endif
			        </div>
			    </div>
			    <br>
			    <div class="form-group @if($errors->has('repetir_password')) has-error @endif">
			    	{!! form::label('repetir_password','Repitir contraseña nueva:',['class'=>'col-xs-2 control-label','for'=>'inputName']) !!}
			    	<div class="col-xs-7">
			        	{!! form::password('repetir_password',['class'=>'form-control','placeholder'=>'Repetir contraseña nueva...']) !!}
			        	@if($errors->has('repetir_password'))
							<p class="help-block">{{$errors->first('repetir_password')}}</p> 
						@endif
			        </div>
			    </div>
			    <br>
			    <div class="form-group">
	    			<div class="col-xs-offset-2 col-xs-10">
			    		{!! form::submit('Cambiar contraseña',['class'=>'btn btn-primary']) !!}
			    	</div>
			    </div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection