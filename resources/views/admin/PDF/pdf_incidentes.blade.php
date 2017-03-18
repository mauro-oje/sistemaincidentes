<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de incidentes</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/css.css">
</head>
<body>
	<h2 class="centro">Listado de Incidentes</h2>

	<table>
	<thead>
		<tr>
			<th>N° Inc</th>
			<th>Apellido y Nombre</th>
			<th>Tipo Incidente</th>
			<th>Prioridad</th>
			<th>Estado</th>
			<th>Descripción</th>
			<th>Fecha y Hota</th>
		</tr>
	</thead>
	<tbody>
		@foreach($incidentes_consulta as $incidente)
			<tr>
				<td>{{$incidente->id}}</td>
				<td>{{$incidente->apellido}} {{$incidente->name}}</td>
				@if($incidente->tipo_incidente == "tecnicoHS")
					<td>{{"Hardware/Software"}}</td>
				@elseif($incidente->tipo_incidente == "tecnicoRI")
					<td>{{"Red/Internet"}}</td>
				@else
					<td>{{"Consulta general"}}</td>
				@endif
				<td>{{$incidente->prioridad}}</td>
				@if($incidente->estado == "abierto")
					<td>{{"Abierto"}}</td>
				@else
					<td>{{"Cerrado"}}</td>
				@endif
				<td>{{$incidente->descripcion_incidente}}</td>
				<td>{{$incidente->created_at}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>


