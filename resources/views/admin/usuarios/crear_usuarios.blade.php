@extends('admin.plantilla.principal')
@section('titulo','Registrar Usuario')
@section('contenido')
	<div class="panel panel-primary">
		<div class=" centro panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar usuario</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.usuarios_crud.store'],$oficinas,$roles,'method'=>'POST','class'=>'form-horizontal']) !!}
				<div class="form-group @if($errors->has('username')) has-error @endif">
					{!! form::label('username','Cuenta de usuario:',['for'=>'inputName','class'=>'control-label col-xs-2']) !!}
					<div class="col-xs-9">
						{!! form::text('username',null,['class'=>'form-control','placeholder'=>'Ingrese la cuenta del usuario...']) !!}
						@if($errors->has('username'))
							<p class="help-block">{{$errors->first('username')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('password')) has-error @endif">
					{!! form::label('password','Contraseña:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::password('password',['for'=>'inputPassword','class'=>'form-control','placeholder'=>'Contraseña']) !!}
						@if($errors->has('password'))
							<p class="help-block">{{$errors->first('password')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('tipo')) has-error @endif">
					<label class="control-label col-xs-2">Tipo de Usuario:</label>
					<div class="col-md-5">
						<select name="tipo" class="form-control">
							<option value="null">Seleccione tipo de usuario</option>
							@foreach($roles as $rol)
								<option value="{{$rol->id}}">{{$rol->id}} - {{$rol->description}}</option>
							@endforeach
						</select>
						@if($errors->has('tipo'))
							<p class="help-block">{{$errors->first('tipo')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('name')) has-error @endif">
					{!! form::label('name','Nombre:',['for'=>'inputName','class'=>'control-label col-xs-2']) !!}
					<div class="col-xs-9">
						{!! form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese nombre...']) !!}
						@if($errors->has('name'))
							<p class="help-block">{{$errors->first('name')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('apellido')) has-error @endif">
					{!! form::label('apellido','Apellido:',['for'=>'inputName','class'=>'control-label col-xs-2']) !!}
					<div class="col-xs-9">
						{!! form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese apellido...']) !!}
						@if($errors->has('apellido'))
							<p class="help-block">{{$errors->first('apellido')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('email')) has-error @endif">
					{!! form::label('email','Correo electrónico:',['for'=>'inputEmail','class'=>'control-label col-xs-2']) !!}
					<div class="col-xs-9">
						{!! form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese correo electronico...']) !!}
						@if($errors->has('email'))
							<p class="help-block">{{$errors->first('email')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label col-xs-2">Oficina:</label>
					<div class="col-md-5">
						<select name="id_oficina" class="form-control">
							<option value="null">Seleccione la oficina (área)...</option>
								@foreach($oficinas as $oficina)
									@if($oficina->area)
										<option value="{{$oficina->id}}">{{ $oficina->oficina }} - {{$oficina->area->nombre_area}}</option>
									 @else
									 	<option value="{{$oficina->id}}">{{ $oficina->oficina }} - {{"Sin área"}}</option>
									 @endif
								@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
						<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
						<a href="{{route('usuario.listar')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection