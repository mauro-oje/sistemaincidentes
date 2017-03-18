@extends('admin.plantilla.principal')
@section('titulo','Editar Usuario')
@section('contenido')
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar usuario</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.usuarios_crud.update',$usuario,$oficinas],'method'=>'PUT','class'=>'form-horizontal col-md-12']) !!}

				<div class="form-group">
					{!! form::label('username','Cuenta de usuario:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('username',$usuario->username,['class'=>'form-control','required']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('tipo','Tipo de Usuario:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo', ['admin'=>'Administrador','miembro'=>'Miembro','tecnicoHS'=>'Hardware/Software','tecnicoRI'=>'Red/Internet'],$usuario->tipo,['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('nombre','Nombre:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('name',$usuario->name,['class'=>'form-control','required']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('apellido','Apellido:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('apellido',$usuario->apellido,['class'=>'form-control','required']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('email','Correo electrónico:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::email('email',$usuario->email,['class'=>'form-control','required']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Oficina</label>
					<div class="col-xs-8">
						<select name="oficina" class="form-control" required>
							@if($usuario->oficina and $usuario->oficina->area)
								<option value="{{$usuario->oficina->id}}">{{ $usuario->oficina->oficina }} - {{$usuario->oficina->area->nombre_area}}</option>
							@elseif($usuario->oficina)
								<option value="{{$usuario->oficina->id}}">{{ $usuario->oficina->oficina}} - {{"Sin área"}}</option>
							@else
								<option value="">Seleccione una oficina..</option>
							@endif
							@foreach($oficinas as $oficina)
								@if($oficina->area)
									<option value="{{$oficina->id}}">{{$oficina->oficina}} - {{$oficina->area->nombre_area}}</option>
								@else
									<option value="{{$oficina->id}}">{{$oficina->oficina}} - {{"Sin área"}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
						{!! form::submit('Editar',['class'=>'btn btn-warning']) !!}
						<a href="{{route('usuario.listar')}}" class="btn btn-danger">Cancelar</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection