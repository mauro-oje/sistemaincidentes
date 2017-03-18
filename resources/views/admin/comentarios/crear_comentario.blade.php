@extends('admin.plantilla.principal')
@section('titulo','comentarios')
@section('contenido')
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')
	<p class="pull-right"><h2 class="text-center"><i class="fa fa-info-circle" aria-hidden="true"></i> Detalle Incidente</h2>
	<div class="panel panel-warning">
		<div class="panel-heading">
		<div class="form-horizontal">
			@if(Auth::user()->tipo != "miembro")
				<div class="form-group" style="margin-right:1px">
					@if($incidente->estado == "abierto")
						<div class="pull-right">
							<a href="{{route('comentario.cerrar',$incidente->id)}}" class="flotar btn btn-sm btn-warning"><i class="fa fa-window-close" aria-hidden="true"></i> Cerrar incidente</a>
						</div>
					@endif
				</div>
			@endif
			@if($incidente->estado == "abierto") 
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Estado:</label>
					<div class="col-sm-10" style="margin-top:6px">
						<p class="form-control-static label label-success" style="margin-top:10px">{{"Abierto"}}</p>
					</div>
				</div>
			@else
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Estado:</label>
					<div class="col-sm-10" style="margin-top:6px">
						<p class="form-control-static label label-danger">{{"Cerrado"}}</p>
					</div>
				</div>
			@endif
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">N° Incidente:</label> 
				<div class="col-sm-10">
					<p class="form-control-static">{{$incidente->id}}</p>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Usuario:</label> 
				<div class="col-sm-10">
					<p class="form-control-static">{{$incidente->user->name}} {{$incidente->user->apellido}}</p>
				</div>
			</div>

			<div class="form-group">
				@if($incidente->tipo_incidente == "tecnicoHS")
					<label for="" class="col-sm-2 control-label">Tipo de incidente:</label> 
						<div class="col-sm-10">
							<p class="form-control-static"> {{"Hardware/Software"}}</p>
						</div>
					<br>
				@elseif($incidente->tipo_incidente == "tecnicoRI")
					<label for="" class="col-sm-2 control-label">Tipo de incidente:</label>
						<div class="col-sm-10">
							<p class="form-control-static"> {{"Red/Internet"}}</p>
						</div>
					<br>
				@else
					<label for="" class="col-sm-2 control-label">Tipo de incidente:</label> 
						<div class="col-sm-10">
							<p class="form-control-static">{{"Consulta general"}}</p>
						</div>
				@endif
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Prioridad:</label> 
				<div class="col-sm-10">
					<p class="form-control-static">{{$incidente->prioridad}}</p>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Descripcion:</label> 
				<div class="col-sm-10">
					<p class="form-control-static">{{$incidente->descripcion_incidente}}</p>
				</div>
			</div>

		</div>
		</div>
		<h4> Comentarios <i class="fa fa-comments" aria-hidden="true"></i></h4>

		@if($comentarios_consulta)
			@foreach($comentarios_consulta as $comentario)
				<div class="panel panel-default">
					<div class="panel-heading">
						@if($comentario->user->tipo == "miembro")
							<p class="pull-right"><i class="fa fa-calendar" aria-hidden="true"></i> {{$comentario->created_at}}</p> <p>{{$comentario->user->name}} {{$comentario->user->apellido}} {{"(Miembro)"}}
							</p>
						@elseif($comentario->user->tipo == "tecnicoHS")
							<p class="pull-right"><i class="fa fa-calendar" aria-hidden="true"></i> {{$comentario->created_at}}</p> <p>{{$comentario->user->name}} {{$comentario->user->apellido}} {{"(Tecnico - Hardware/Software)"}}
							</p>
						@elseif($comentario->user->tipo == "tecnicoRI")
							<p class="pull-right"><i class="fa fa-calendar" aria-hidden="true"></i> {{$comentario->created_at}}</p> <p>{{$comentario->user->name}} {{$comentario->user->apellido}} {{"(Tecnico - Red/Internet)"}}
							</p>
						@else
							<p class="pull-right"><i class="fa fa-calendar" aria-hidden="true"></i> {{$comentario->created_at}}</p> <p>{{$comentario->user->name}} {{$comentario->user->apellido}} {{"(Administrador)"}}
							</p>
						@endif
					</div>
					<div class="panel-body">
						<p>{{$comentario->comentario}}</p>
					</div>
				</div>
			@endforeach

			@if($incidente->estado == "abierto")
				{!! Form::open(['route'=>'comentario.crear.post', 'method'=>'POST','class'=>'form-horizontal']) !!}
					{!! form::textarea('comentario',null,['class'=>'form-control','rows'=>'3', 
														'placeholder'=>'Ingrese comentario...']) 
								!!}
					{!! form::hidden('incidente_id',$incidente->id) !!}
					<div><br>
						<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Comentar</button>
						@if(Auth::user()->tipo == "miembro")
							<a href="{{route('incidente.listado.miembros')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
						@else
							<a href="{{route('incidente.listado.tecnico')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
						@endif
					</div>
				{!! Form::close() !!}
			@else
				<h3 class="centro">{{"Incidente cerrado"}} <i class="fa fa-window-close" aria-hidden="true"></i></h3>
				@if(Auth::user()->tipo == "miembro")
					<a href="{{route('incidente.listado.miembros')}}" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
				@else
					<a href="{{route('incidente.listado.tecnico')}}" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
				@endif
			@endif
		@else
			{{"No hay comentarios disponibles"}}
		@endif
	</div>
@endsection