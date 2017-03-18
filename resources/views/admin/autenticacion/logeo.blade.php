@extends('admin.plantilla.principal')
@section('titulo', 'Autenticacion')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	<div class="col-md-6">
		<div class="jumbotron">
		  <div class="container">
		    <h2>Sistema de gestión de Incidentes!</h2>
		    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
		    <p><a class="btn btn-primary btn-lg" href="#" role="button">Leer más &raquo;</a></p>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span> Autenticacion de usuario</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['route'=>'admin.autenticacion.logeo', 'method'=>'POST','class'=>'form-horizontal']) !!}

					<div class="form-group">
						{!! form::label('cuenta','Cuenta:',['class'=>'col-sm-2 control-label','for'=>'inputEmail3']) !!}
						<div class="col-sm-12">
							{!! form::text('cuenta',null,['class'=>'form-control','placeholder'=>'Ingrese su cuenta de usuario','required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! form::label('password','Contraseña:',['class'=>'col-sm-2 control-label','for'=>'inputEmail3']) !!}
						<div class="col-sm-12">
							{!! form::password('password',['class'=>'form-control','placeholder'=>'contaseña','required']) !!}
						</div>
					</div>
					<div class="form-group">
					    <div class="col-sm-offset-1 col-sm-11">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox"> Recordar
					        </label>
					      </div>
					    </div>
					</div>
					{!! form::submit('Logearse',['class'=>'btn-group btn btn-primary','role'=>'group']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
