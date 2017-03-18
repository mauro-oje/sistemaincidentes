<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de usuarios</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/css.css">
</head>
<body>
	<h2>Listado de usuarios</h2>
	<table>
		<thead>
			<tr>
				<th>Apellido y nombre</th>
				<th>E-mail</th>
				<th>Tipo de usuario</th>
				<th>Oficina</th>
				<th>Área</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{$usuario->apellido}} {{$usuario->name}}</td>
					<td>{{$usuario->email}}</td>
					@if($usuario->tipo == "tecnicoHS")
						<td>Hardware/Software</td>
					@elseif($usuario->tipo == "tecnicoRI")
						<td>Red/Internet</td>
					@elseif($usuario->tipo == "miembro")
						<td>Miembro</td>
					@else
						<td>Administrador</td>
					@endif
					@if($usuario->oficina){
						<td>{{$usuario->oficina->oficina}}</td>
					}@else
						<td>Sin Oficina</td>
					@endif
					@if($usuario->oficina != null)
						<td>{{$usuario->oficina->area->nombre_area}}</td>
					@else
						<td>Sin Área</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>