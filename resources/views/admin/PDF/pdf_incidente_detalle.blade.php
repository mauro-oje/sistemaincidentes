<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Dettale incidente</title>
		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/css.css') }}">

		<style>
			 html,body {
            	height:100%;
        	}
		</style>

	</head>

	<body>	
		<hr>
		<div id="header-top">
			<h3 class="centro" >Incidente detalles</h3>
		</div>
		<hr>

		<div class="content">
			@foreach($incidente_consulta as $incidente) <br>
				<strong>N° Incidente:</strong> {{$incidente->id}} <br>
				<strong>Fecha y hora:</strong> {{$incidente->created_at}} <br>
				<strong>Usuario:</strong> {{$incidente->user->apellido}} {{$incidente->user->name}} <br>
				@if($incidente->tipo_incidente == "tecnicoHS")
					<strong>Tipo Incidente:</strong> {{"Hardwared - Software"}} <br>
				@elseif($incidente->tipo_incidente == "tecnicoRI")
					<strong>Tipo Incidente:</strong> {{"Red - Internet"}} <br>
				@else
					<strong>Tipo Incidente:</strong> {{"Consulta general"}} <br>
				@endif
				<strong>Prioridad:</strong> {{$incidente->prioridad}} <br>
				@if($incidente->estado == "abierto")
					<strong>Estado:</strong> {{"Abierto"}} <br>
				@else
					<strong>Estado:</strong> {{"Cerrado"}} <br>
				@endif
			@endforeach
			<hr>
			<h3>Comentarios</h3>
			
			@foreach($incidente_consulta_detalle as $detalle)
					<strong>{{$detalle->apellido}} {{$detalle->name}}</strong>
					@if($detalle->tipo == "tecnicoHS") 
					 	{{"(Hardwared/Software)"}}
					@elseif($detalle->tipo == "tecnicoRI")
					 	{{"(Red/Internet)"}}
					@elseif($detalle->tipo == "miembro")
					 	{{"(Usuario)"}}
					@else
					 	{{"(Administrador)"}}
					@endif
					{{$detalle->created_at}}: 
					<p>{{$detalle->comentario}}</p>  <br>
			@endforeach
		</div>
		
		<div class="centro" id="footer">
			<p>Sistema gestion de incidentes</p>
		</div>
	</body>	

</html>