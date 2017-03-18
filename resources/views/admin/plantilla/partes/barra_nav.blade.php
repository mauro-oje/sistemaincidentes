<!-- Fixed navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Gestión de Incidentes</a>
      </div>
    
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
      </ul>

        @if(Auth::user()->tipo != 'miembro')
          <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Usuarios <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  @if(Auth::user()->tipo =='tecnicoHS')
                    <li><a href="{{route('usuario.listar.tecnicohs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                  @elseif(Auth::user()->tipo == "tecnicoRI")
                    <li><a href="{{route('usuario.listar.tecnicori')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                  @else
                    <li><a href="{{route('user.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                    <li><a href="{{route('usuario.listar')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                  @endif
                </ul>
              </li>
          </ul>
            @if(Auth::user()->tipo == "admin")
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Áreas <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('area.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                    <li><a href="{{route('area.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                  </ul>
                </li>
              </ul>

              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-desktop" aria-hidden="true"></i> Oficinas <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('oficina.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                    <li><a href="{{route('oficina.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                  </ul>
                </li>
              </ul>
            @endif 
            <!--
            <ul class="nav navbar-nav">
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            -->
            <!-- Collect the nav links, forms, and other content for toggling -->      
            <ul class="nav navbar-nav">
              <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-hdd-o" aria-hidden="true"></i> Hardware <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">       
                  <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">Equipos
                    <ul class="dropdown-menu">
                      @if(Auth::user()->tipo == "tecnicoHS") 
                        <li><a tabindex="-1" href="{{route('equipo.index.hs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>  
                      @elseif(Auth::user()->tipo == "tecnicoRI")
                        <li><a tabindex="-1" href="{{route('equipo.index.ri')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                      @else
                        <li><a href="{{route('equipo.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a>
                        </li>
                        <li><a tabindex="-1" href="{{route('equipo.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                      @endif
                    </ul>
                  </li>           
                  <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Placas Madres
                      <ul class="dropdown-menu">
                        @if(Auth::user()->tipo == "tecnicoHS")
                          <li><a tabindex="-1" href="{{route('placa.madre.index.hs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                        @elseif(Auth::user()->tipo == "tecnicoRI")
                          <li><a tabindex="-1" href="{{route('placa.madre.index.ri')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                        @else
                          <li><a href="{{route('placa.madre.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                          <li><a tabindex="-1" href="{{route('placa.madre.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>                         
                        @endif
                      </ul>
                  </li>
                  <li class="dropdown-submenu">
                    <a tabindex="-1" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Procesador 
                    <ul class="dropdown-menu">
                      @if(Auth::user()->tipo == "tecnicoHS")
                        <li><a tabindex="-1" href="{{route('procesador.index.tecnicohs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                      @elseif(Auth::user()->tipo == "tecnicoRI")
                        <li><a tabindex="-1" href="{{route('procesador.index.tecnicori')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                      @else              
                        <li><a href="{{route('procesador.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                        <li><a tabindex="-1" href="{{route('procesador.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                      @endif
                    </ul>
                  </li>
                  <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Memorias RAM 
                      <ul class="dropdown-menu">
                        @if(Auth::user()->tipo == "tecnicoHS")
                          <li><a tabindex="-1" href="{{ route('memoria.ram.index.hs') }}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                        @elseif(Auth::user()->tipo == "tecnicoRI")
                          <li><a tabindex="-1" href="{{ route('memoria.ram.index.ri') }}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                        @else                      
                          <li><a href="{{ route('memoria.ram.crear') }}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                          <li><a tabindex="-1" href="{{ route('memoria.ram.index') }}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>  
                        @endif
                      </ul>
                  </li>
                  <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Discos duros
                      <ul class="dropdown-menu">
                        @if(Auth::user()->tipo == "tecnicoHS")
                          <li><a tabindex="-1" href="{{ route('disco.duro.index.hs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                        @elseif(Auth::user()->tipo == "tecnicoRI")  
                          <li><a tabindex="-1" href="{{route('disco.duro.index.ri')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                        @else                   
                          <li><a href="{{route('disco.duro.crear') }}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                          <li><a tabindex="-1" href="{{route('disco.duro.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                        @endif
                      </ul>
                  </li>
                  <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Fuentes
                      <ul class="dropdown-menu">
                        @if(Auth::user()->tipo == "tecnicoHS")
                          <li><a tabindex="-1" href="{{route('fuente.index.hs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>     
                        @elseif(Auth::user()->tipo == "tecnicoRI")  
                          <li><a tabindex="-1" href="{{route('fuente.index.ri')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                        @else
                          <li><a href="{{route('fuente.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                          <li><a tabindex="-1" href="{{route('fuente.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                        @endif
                      </ul>
                  </li>
                   <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Impresoras
                      <ul class="dropdown-menu">
                        @if(Auth::user()->tipo == "tecnicoHS")
                          <li><a tabindex="-1" href="{{route('impresora.index.hs')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>     
                        @elseif(Auth::user()->tipo == "tecnicoRI")  
                          <li><a tabindex="-1" href="{{route('impresora.index.ri')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li> 
                        @else                 
                          <li><a href="{{route('impresora.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                          <li><a tabindex="-1" href="{{route('impresora.index')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>  
                        @endif
                      </ul>
                  </li>
                  <!-- Para agregar otra opción --> 
                  <!--
                  <li><a href="#">Link</a></li>
                  --> 
                </ul>
              </li> <!-- .dropdown -->    
              </ul>
          @endif
          
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench" aria-hidden="true"></i> Incidente <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @if(Auth::user()->tipo == 'miembro')
                  <li><a href="{{route('incidente.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                  <li><a href="{{route('incidente.listado.miembros')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
                @else
                  <li><a href="{{route('incidente.crear')}}"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</a></li>
                  <li><a href="{{route('incidente.listado.tecnico')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar Inc. recibidos</a></li>
                  <li><a href="{{route('incidente.listado.tecnico.propio')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar Inc. registrados</a></li>
                @endif
              </ul>
            </li>
          </ul>
        
        @if(Auth::user()->tipo == "admin")
          <ul class="nav navbar-nav">
            <li><a href="{{url('incidente/estadisticas')}}"><i class="fa fa-pie-chart" aria-hidden="true"></i> Reportes</a></li>
          </ul>
        @endif
        
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}} {{Auth::user()->apellido}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{route('create.cambiarPassword')}}"><i class="fa fa-unlock" aria-hidden="true"></i> Cambiar contraseña</a></li>
                <li><a href="{{route('usuario.mis.datos',Auth::user()->id)}}"><i class="fa fa-database" aria-hidden="true"></i> Mis datos</a></li>
                <li><a href="{{route('usuario.mi.equipo',Auth::user()->id)}}"><i class="fa fa-laptop" aria-hidden="true"></i> Mi equipo</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('admin.autenticacion.logout')}}"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
              </ul>
            </li>
        </ul>

      </div><!--/.nav-collapse -->
    </div>
  </nav>
