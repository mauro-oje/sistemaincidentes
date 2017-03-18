@extends('admin.plantilla.principal')
@section('titulo', 'Recupera contraseña')
@section('contenido')

	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->
	
	<div class=" panel panel-primary">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-th-list"></span> Recuperar contraseña</h3>
		</div>
		<div class="panel-body">

			{!! Form::open(['route'=>'password.postReset','method'=>'POST','role'=>'form']) !!}

				<div class="form-group">
					<div class="col-md-6">
						{!! form::hidden('token',$token,null,['class'=>'control-label','for'=>'inputName']) !!}
						<br>
						{!! form::text('email',null,['value'=>"{{old('email')}}"]) !!}
						{!! form::password('password') !!}
						{!! form::password('password_confirmacion') !!}
					</div>
				</div>
				<br>
				{!! form::submit('Restablecer') !!}
				<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Resgistrar</button>

			{!! Form::close() !!}

		</div>
	</div>

@endsection

