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
    <title> @yield('titulo', 'Default') - SGI </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/jquery.dataTables.min.css') }}">

    <!-- Submenus Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap-submenu-2.0.4/dist/css/bootstrap-submenu.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Trumbowyg CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/Trumbowyg/ui/trumbowyg.css') }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style>
      body{
        margin-top: 50px;
      }
    </style>

  </head>

  <body>
    
    <!--Incluyo el scrip para tener Jquery-->
    <script
          src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
          crossorigin="anonymous">
    </script>
    
    @include('admin.plantilla.partes.barra_nav')

    <section class="container">
      <!--Incluyo el codigo de los errroes ($errors) de formulario-->
      @include('admin.plantilla.partes.errores')
      
      @yield('contenido')

    </section>

    <script src="{{ asset('plugins/bootstrap/js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/Trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{ asset('plugins/js/scripts.js') }}"></script>

    <!-- Script para el Submenu -->
    <script type="text/javascript">
      $(document).ready(function() {
        // For the Second level Dropdown menu, highlight the parent 
        $( ".dropdown-menu" )
        .mouseenter(function() {
          $(this).parent('li').addClass('active');
        })
        .mouseleave(function() {
          $(this).parent('li').removeClass('active');
        });
      });

      $(document).ready(function() {
        $('#ejemplo_tabla').DataTable();
      });
    </script>
    
    @yield('js')
  
  </body>
    
</html>