<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Ojeda Mauro Ariel">
    <link rel="icon" href="../../favicon.ico">
    <title> @yield('titulo','Inicio') | Iniciar sesion </title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/css.css') }}">
    <!-- Submenus Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap-submenu-2.0.4/dist/css/bootstrap-submenu.min') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- JavaScript para los sub-menus 
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <script src="dist/js/bootstrap-submenu.min.js" defer></script> -->
    <!-- -->
    <!-- Llamo a los archivos CSS de Chosen-->
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
    <style>
      body{
        margin-top: 50px;
      }
    </style>
    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

      (function() {
         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
    @if(Session::has('mensaje_error'))
        {{ Session::get('mensaje_error') }}
    @endif
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
        <h1>Sisitema de gestión de Incidentes</h1>
        <p>Bienvenidos al sistema de Manuales en Línea de Argentina.</p>
        <!--  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2 style="text-aling:center">Nuestro equipo</h2>
          <p>Nuestro grupo humano tiene como objetivo brindarle soluciones rápidas, profesionales y eficientes.</p>
          <p>Mediante especialistas altamente calificados le damos un trato cordial y personalizado, lo cual nos distingue en el mercado.</p>
          <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div>
        <div class="col-md-4">
          <h2>Incidentes</h2>
          <p>Llevamos adelante la registración de todos y cada uno de los incidentes de tu empresa. 
          <p>Es normal que un cliente tenga distintos tipos de inconveniente con su ordenador, este sistema te permitirá registrar dichos inconveniente y notificar a las personas calificada para poder solucionar todos tus problemas relacionados con el área infomática.</p>
          <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
       </div>
        <div class="col-md-4">
          <h2>Soporte</h2>
          <p>Te brindamos soporte y mantenimiento con los mejores profesionales y técnicos en el área de sistemas.</p>
          <p>Registramos todos los activos de los usuarios registrados en el sistemas y asi poder indetificar de manera inmediata cualquier tipo de inconveniente de los mismos.</p>
          <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div>
      </div>
      <hr>
      <footer>
        <p>&copy; 2017 Mauro's Company, Inc.</p>
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
