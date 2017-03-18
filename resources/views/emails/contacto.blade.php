<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Ojeda Mauro Ariel">
    <link rel="icon" href="../../favicon.ico">
    <title> Iniciar sesion </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/css.css') }}">

    <!-- Submenus Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- -->

    <style>
      body{
        margin-top: 50px;
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-wrench"></span> Gestión de incidentes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--<li><a href="#about"><span class="glyphicon glyphicon-hand-right"></span> Acerca de nosotros</a></li>-->
            <li><a href="{{route('mails.getEmail')}}"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="POST" action="{{route('admin.autenticacion.loginPost')}}">
            {!! csrf_field() !!}
            <div class="form-group">
              <input type="text" name="username" placeholder="Cuenta de usuario" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Contraseña" class="form-control">
            </div>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Acceder</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('password.getEmail')}}">¿Olvidaste tu contraseña?</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        
        <h1 class="centro">Formulario de contacto</h1>
        <br>
        <form class="form-inline" method="POST" action="{{route('mail.store')}}">
          {!! csrf_field() !!}
          <div class="form-group col-xs-10 @if($errors->has('nombre')) has-error @endif">
              <label for="exampleInputName2">De:</label>
              <input type="text" name="nombre" class="form-control" id="exampleInputName2" placeholder="Ingrese nombre...">
              @if($errors->has('nombre'))
                <p class="help-block">{{$errors->first('nombre')}}</p> 
              @endif
              <label for="exampleInputEmail2">Email:</label>
              <input type="email" class="form-control" name="email" placeholder="ejemplo@email.com">
              @if($errors->has('email'))
                <p class="help-block">{{$errors->first('email')}}</p> 
              @endif
          </div>
          <br>
          <br>
          <div class="form-group @if($errors->has('mensaje')) has-error @endif">
            <div class="col-xs-2">
              <label for="exampleInputName2">Mensaje:</label>
              <textarea class="form-control" name="mensaje" rows="3" cols="100" placeholder="Ingrese mensaje..."></textarea>
              @if($errors->has('mensaje'))
                <p class="help-block">{{$errors->first('mensaje')}}</p> 
              @endif
            </div>
          </div>
          <br>
          <br>
          <div class="form-group">
            <div class="col-xs-2">
              <button type="submit" class="btn btn-default">Enviar</button>
            </div>
          </div>
        </form>
			</div>
      </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2 style="text-aling:center">Nuestro equipo</h2>
          <p>Nuestro grupo humano tiene como objetivo brindarle soluciones rápidas, profesionales y eficientes.</p>
          <p>Mediante especialistas altamente calificados le damos un trato cordial y personalizado, lo cual nos distingue en el mercado.</p>
        </div>
        <div class="col-md-4">
          <h2>Incidentes</h2>
          <p>Llevamos adelante la registración de todos y cada uno de los incidentes de tu empresa.</p>
          <p>Es normal que un cliente tenga distintos tipos de inconveniente con su ordenador, este sistema te permitirá registrar dichos inconveniente y notificar a las personas calificada para poder solucionar todos tus problemas relacionados con el área infomática.</p>
       </div>
        <div class="col-md-4">
          <h2>Soporte</h2>
          <p>Te brindamos soporte y mantenimiento con los mejores profesionales y técnicos en el área de sistemas.</p>
          <p>Registramos todos los activos de los usuarios registrados en el sistemas y asi poder indetificar de manera inmediata cualquier tipo de inconveniente de los mismos.</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Mauro's Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
