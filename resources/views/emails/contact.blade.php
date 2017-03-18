<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contacto - Mail</title>
</head>
<body>
	@if(! $errors->isEmpty())
	<div class="alert alert-danger">
		<p><strong>Ups!</strong> se ha producido un error!</p>
	</div>
	@endif
	<p><strong>Nombre: </strong>{!!$nombre!!}</p>
	<p><strong>E-mail: </strong>{!!$email!!}</p>
	<p><strong>Mensaje: </strong>{!!$mensaje!!}</p>
</body>
</html>