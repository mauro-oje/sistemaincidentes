@extends('admin.plantilla.principal')
@section('titulo','Cambiar contraseña')
@section('contenido')

	<div class="panel panel-primary">

		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-th-list"></span> Cambiar contraseña</h3>
		</div>

		<div class="panel-body">
			<div class="form-horizontal">
				<div class="form-group">
					<div class="col-xs-offset-1 col-xs-8">
			    		<h3>La contraseña actual no es correcta</h3>
			    	</div>
			    </div>
			    <br>
			    <div class="form-group">
	    			<div class="col-xs-offset-1 col-xs-8">
	    				<a href="{{route('create.cambiarPassword')}}" class="btn btn-primary">Volver</a>
			    	</div>
			    </div>
		    </div>
		</div>
	</div>

@endsection