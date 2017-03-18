if($consulta_ip){
            if($consulta_ip->id != $request->id_ip){         
                $ip_anterior = Ip::find($consulta_ip->id);
                $ip_anterior->disponible = "si";
                $ip_anterior->impresora_id = null;
                $ip_anterior->save();

                $ip = Ip::find($request->id_ip);
                $ip->disponible = "no";
                $ip->impresora_id = $id;
                $ip->save();
            }
        }else{
            $ip = Ip::find($request->id_ip);
            $ip->disponible = "no";
            $ip->impresora_id = $id;
            $ip->save();
        }
        $impresora->save();



@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Equipo')
@section('contenido')
    <!--Acá va el Include de los errores que esta en la
        plantilla Principal (include(admin.plantilla.errors))-->

    <!--Usamos el paquete de formulario para crear el formlario
    de ceracion de Oficina -->
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar Equipo</h3>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" method="POST" action="{{route('equipo.crearPost')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipo:</label>
                    <div class="col-xs-8">
                        <select name="user_id" class="form-control" required>
                            <option value="null">Seleccione tipo...</option>
                            <option value="PC">PC</option>
                            <option value="Notebook">Notebook</option>
                            <option value="Netbook">Netbook</option>
                            <option value="All-in-one">All-in-one</option>
                            <option value="Tablet">Tablet</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-xs-9">
                        <input type="text" name="nombre_equipo" class="form-control" placeholder="Ingrese nombre (Ej:PC-001)..." required>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Usuario</label>
                    <div class="col-xs-8">
                        <select name="user_id" class="form-control" required>
                            <option value="">Seleccione usuario...</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->apellido.' '.$usuario->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Placa madre</label>
                    <div class="col-xs-8">
                        <select name="id_placa" class="form-control" required>
                            <option value="null">Seleccione placa madre...</option>
                            @foreach($placas as $placa)
                                <option value="{{$placa->id}}">{{ $placa->marca_placa.' - '.$placa->modelo_placa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Procesador</label>
                    <div class="col-xs-8">
                        <select name="id_procesador" class="form-control" required>
                            <option value="null">Seleccione procesador...</option>
                            @foreach($procesadores as $procesador)
                                <option value="{{ $procesador->id }}">{{ $procesador->marca_procesador.' - '.$procesador->modelo_procesador.' - '.$procesador->capacidad_procesador}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group" id="mem">
                    <label class="col-sm-2 control-label">Memoria (slot-1)</label>
                    <div class="col-xs-8">
                        <select id="id_memoria" name="id_memoria" class="form-control" required>
                            <option value="null">Seleccione memoria...</option>
                            @foreach($memorias as $memoria)
                                <option value="{{$memoria->id}}">{{ $memoria->tipo_memoria.' - '.$memoria->marca_memoria.' - '.$memoria->capacidad_memoria.' - '.$memoria->frecuencia}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group hide" id="mem2">
                    <!-- aca se carga la segunda memoria -->
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Disco</label>
                    <div class="col-xs-8">
                        <select name="id_disco" class="form-control" required>
                            <option value="null">Seleccione placa disco...</option>
                            @foreach($discos as $disco)
                                <option value="{{$disco->id}}">{{ $disco->marca_disco.' - '.$disco->capacidad_disco.' - '.$disco->interface}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Sistema Operativo:</label>
                    <div class="col-xs-8">
                        <select name="user_id" class="form-control" required>
                            <option value="null">Seleccione sistema operativo...</option>
                            <option value="Windows XP 32-bit">Windows XP 32-bit</option>
                            <option value="Windows 7 Pro 32-bit">Windows 7 Pro 32-bit</option>
                            <option value="Windows 7 Pro 64-bit">Windows 7 Pro 64-bit</option>
                            <option value="Windows 8.1 Pro 32-bit">Windows 8.1 Pro 32-bit</option>
                            <option value="Windows 8.1 Pro 64-bit">Windows 8.1 Pro 64-bit</option>
                            <option value="Windows 10 Pro 32-bit">Windows 10 Pro 32-bit</option>
                            <option value="Windows 10 Pro 64-bit">Windows 10 Pro 64-bit</option>
                            <option value="Linux Ubuntu 16.0.2">Linux Ubuntu 16.0.2</option>
                            <option value="Android">Android</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ip</label>
                    <div class="col-xs-8">
                        <select name="id_ip" class="form-control" required>
                            <option value="null">Seleccione IP...</option>
                            @foreach($ips as $ip)
                                    <option value="{{$ip->id}}">{{ $ip->direccion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Fuente</label>
                    <div class="col-xs-8">
                        <select name="id_fuente" class="form-control" required>
                            <option value="null">Seleccione fuente...</option>
                            @foreach($fuentes as $fuente)
                                <option value="{{$fuente->id}}">{{ $fuente->marca_fuente.' - '.$fuente->modelo_fuente.' - '.$fuente->capacidad_fuente}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Impresora</label>
                    <div class="col-xs-8">
                        <select name="id_impresora" class="form-control">
                            <option value="null">Seleccione impresora...</option>
                            @foreach($impresoras as $impresora)
                                <option value="{{$impresora->id}}">{{ $impresora->marca_impresora.' - '.$impresora->modelo_impresora.' - '.$impresora->tipo_impresora}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Descripción adicional:</label>
                    <div class="col-xs-9">
                        <textarea type="text" name="descripcion" cols="30" rows="10" class="form-control" placeholder="Ingrese alguna descripcion adicional..."></textarea>
                    </div>
                </div>
                <br>
                <div class="col-xs-offset-2 col-xs-8">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
                    <a href="{{route('equipo.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#id_memoria').change(function(){
            var id_memoria = $(this).val();
            $.get('cargar_memoria', {id_memoria: id_memoria}, function(html){
                $("#mem2").html(html);
                $("#mem2").removeClass("hide");
            });
        });
    </script>
@endsection




public function listadoTecnicoAjax(){

        $tipo = Auth::user()->tipo;

        // SELECT u.id, u.name, u.apellido, i.tipo_incidente, i.prioridad, i.estado, i.descripcion_incidente 
        // FROM incidentes_usuarios AS iu 
        // INNER JOIN users AS u ON iu.user_id = u.id 
        // INNER JOIN incidentes AS i ON iu.incidente_id = i.id 
        // WHERE i.tipo_incidente = 'tecnicoRI'

        $incidentes_consulta = db::table('incidentes as i')
            ->join('users as u', 'u.id', '=', 'i.user_id')
            ->select('u.name','u.apellido','i.id','i.tipo_incidente','i.prioridad','i.estado','i.descripcion_incidente')
            ->where('i.tipo_incidente',$tipo)
            ->get();
            
        /* Con esto andaba bien.
        foreach($incidentes_consulta as $key => $value){
            $resources['data'][] = $value;
        }

        $resources_JASON_array = json_encode($resources);
        return $resources_JASON_array;
        */
        if($incidentes_consulta){
                foreach($incidentes_consulta as $key => $value){
                    $resources['data'][] = $value;
                }
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }else{
                $resources['data'][] = array("name"=>"","apellido"=>"","id"=>"0","tipo_incidente"=>"-","prioridad"=>"","estado"=>"","descripcion_incidente"=>"");
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }
    }



<ul class="nav navbar-nav">
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench" aria-hidden="true"></i> Incidente <span class="caret"></span></a>
  <ul class="dropdown-menu">
    @if(Auth::user()->tipo == 'miembro')
      <li><a href="{{route('incidente.listado.miembros')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
      <li><a href="{{route('incidente.crear')}}"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</a></li>
    @else
      <li><a href="{{route('incidente.listado.tecnico')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Listar</a></li>
    @endif
  </ul>
</li>
</ul>



@extends('admin.plantilla.principal')
@section('titulo','Listado de Equipos')
@section('contenido')

    <h2 class="text-center">Listado de Equipos (Index)</h2>
    <a href="{{route('equipo.crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Equipo</a>
    <hr>
    <!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
    @include('flash::message')
    
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>S.O.</th>
            <th>Usuario</th>
            <th>Placa Madre</th>
            <th>Procesador</th>
            <th>Memoria</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </thead>
        <tbody>

            @foreach($equipos as $equipo)
                <tr>
                    <td>{{$equipo->id}}</td>
                    <td>{{$equipo->tipo}}</td>
                    <td>{{$equipo->nombre_equipo}}</td>
                    <td>{{$equipo->so}}</td>
                    @if($equipo->usuario->tipo == "admin")
                        <td><span class="label label-success">{{$equipo->usuario->apellido.' '.$equipo->usuario->name}}</span></td>
                    @else
                        <td><span class="label label-default">{{$equipo->usuario->apellido.' '.$equipo->usuario->name}}</span></td>
                    @endif
                    @if($equipo->placaMadre)
                        <td>{{$equipo->placaMadre->marca_placa}}</td>
                    @else
                        <td>{{"Sin placa madre"}}</td>
                    @endif
                    @if($equipo->procesador)
                        <td>{{$equipo->procesador->marca_procesador}}</td>
                    @else
                        <td>{{"Sin procesador"}}</td>
                    @endif
                    @if($equipo->memoriasRam)
                        <td>
                            @foreach($equipo->memoriasRam as $memoria)
                                {{$memoria->capacidad_memoria.' '.$memoria->marca_memoria}}
                            @endforeach
                        </td>
                    @else
                        <td>{{"Sin memoria"}}</td>
                    @endif
                    <td>{{$equipo->descripcion}}</td>
                    <td>
                        <a href="{{route('admin.equipo_crud.edit',$equipo->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                        <a href="{{route('equipo.borrar',$equipo->id)}}" class="btn btn-danger" onclick="return confirm('Are you chure?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $equipos->render() !!}

@endsection




@extends('admin.plantilla.principal')
@section('titulo','Mi equipo')
@section('contenido')

    <!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
    @include('flash::message')
    
    <h3 class="centro">Mi equipo</h3>
    <hr>
    <div class="form-horizontal">
        @if($equipo)
            @foreach($equipo as $e)
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tipo:</label> 
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$e->tipo}}</p>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nombre:</label> 
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$e->nombre_equipo}}</p>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    @if($e->placaMadre)
                        <label for="" class="col-sm-2 control-label">Placa Madre:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->placaMadre->marca_placa}} {{$e->placaMadre->modelo_placa}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Placa Madre:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin Placa madre"}}</p>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    @if($e->procesador)
                        <label for="" class="col-sm-2 control-label">Microprocesador:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->procesador->marca_procesador}} {{$e->procesador->modelo_procesador}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Microprocesador:</label>
                        <div class="col-sm-10">
                            {{"Sin Microprocesador"}}
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    @if($e->memoriasRam[0])
                        <label for="" class="col-sm-2 control-label">Memoria ram (slot-1):</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->memoriasRam[0]->marca_memoria}} {{$e->memoriasRam[0]->tipo_memoria}} {{$e->memoriasRam[0]->frecuencia}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Memoria ram (slot-1):</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin Memoria ram"}}</p>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    @if($e->discosDuros[0])
                        <label for="" class="col-sm-2 control-label">Disco:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->discosDuros[0]->tipo_disco}} {{$e->discosDuros[0]->marca_disco}} {{$e->discosDuros[0]->modelo_disco}} {{$e->discosDuros[0]->capacidad_disco}} {{$e->discosDuros[0]->interface}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Disco:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin Disco"}}</p>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    @if($e->so)
                        <label for="" class="col-sm-2 control-label">Sistema Operativo:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->so}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Sistema Operativo:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin Sistema operativo"}}</p>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    @if($e->ips[0])
                        <label for="" class="col-sm-2 control-label">Dirección IP:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->ips[0]->direccion}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Dirección IP:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin dirección IP"}}</p>
                        </div>
                    @endif
                
                </div>
                <hr>
                <div class="form-group">
                    @if($e->fuente)
                        <label for="" class="col-sm-2 control-label">Fuente:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->fuente->marca_fuente}} {{$e->fuente->modelo_fuente}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Fuente:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin Fuente"}}</p>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    @if($e->impresoras[0])
                        <label for="" class="col-sm-2 control-label">Impresora:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$e->impresoras[0]->marca_impresora}} {{$e->impresoras[0]->modelo_impresora}} {{$e->impresoras[0]->tipo_impresora}}</p>
                        </div>
                    @else
                        <label for="" class="col-sm-2 control-label">Impresora:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{"Sin Impresora"}}</p>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                @if($e->descripcion)
                    <label for="" class="col-sm-2 control-label">Descripción:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$e->descripcion}}
                    </div>
                @else
                    <label for="" class="col-sm-2 control-label">Descripción:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Sin descripción"}}</p>
                    </div>
                @endif
                <hr>
            @endforeach
        @else
            {{"No hay equipo asignado para éste usuario"}}
        @endif
        <hr>
    </div>
    
@endsection



public function cambiarPassword(Request $request){

    $rules = array(
        'password'         => 'required',
        'password_nuevo'   => 'required|min:5',
        'repetir_password' => 'required|same:password_nuevo'
    );
    $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'min'      => 'El campo :attribute no puede tener menos de :min carácteres.'
    );
   
    $validation = Validator::make(Input::all(), $rules, $messages);
    if ($validation->fails())
    {
        return Redirect::to('usuario/cambiar-contraseña')->withErrors($validation)->withInput();
    }
    else{
        if (Hash::check(Input::get('password'), Auth::user()->password))
        {
            $usuario = new User();
            $usuario = Auth::user();
            $usuario->password = Hash::make(Input::get('password_nuevo'));
            $usuario->save();
           if($usuario->save()){
                return Redirect::to('usuario/cambiar-contraseña')->with('notice', 'Nueva contraseña guardada correctamente');
           }
           else
           {
               return Redirect::to('usuario/cambiar-contraseña')->with('notice', 'No se ha podido guardar la nueva contaseña');
            }
        }
        else
        {
            return Redirect::to('usuario/cambiar-contraseña')->with('notice', 'La contraseña actual no es correcta')->withInput();
        }

    }

}




public function cambiarPassword(Request $request){

    $rules = array(
        'password'         => 'required',
        'password_nuevo'   => 'required|min:5',
        'repetir_password' => 'required|same:password_nuevo'
    );
    $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'min'      => 'El campo :attribute no puede tener menos de :min carácteres.'
    );
   
    $validation = Validator::make($request->all(),$rules,$messages);

    if($validation->fails()){
        flash('Upp! tenemos problem hiuuuustooonnn','warning');
        return Redirect::to('/usuario/cambiar-contraseña')->withErrors($validation)->withInput();
    }else{
        if(Hash::check($request->password,Auth::user()->password)){
            $usuario = new User();
            $usuario = Auth::user();
            $usuario->password = Hash::make($request->password_nuevo);
            $usuario->save();

            if($usuario->save()){
                //return Redirect::to('/')->with('notice', 'Nueva contraseña guardada de forma correcta!');
                flash('Nueva contraseña guardada de forma correcta!','success');
                return Redirect::to('usuario/cambiar-contraseña');
            }else{
                //return Redirect::to('/')->with('notice', 'No se ha podido guardar la nueva contaseña!');
                flash('No se ha podido guardar la nueva contaseña!','danger');
                return Redirect::to('usuario/cambiar-contraseña');
            }
        }else{
            //return Redirect::to('/')->with('notice', 'La contraseña actual no es correcta')->withInput();
            flash('La contraseña actual no es correcta');
            return Redirect::to('usuario/cambiar-contraseña')->with('flash', 'La contraseña actual no es correcta')->withInput();
            //return redirect()->route('showPassword');
        }
    }

}



@include('admin.plantilla.partes.errores')


public function cambiarPassword(Request $request){
        $bpassword = bcrypt($request->password);
        //dd($request->all(),$bpassword);
        $rules = array(
            'password'    => 'required',
            'newpassword' => 'required|min:5',
            'repassword'  => 'required|same:newpassword'
        );

        $messages = array(
                'required' => 'El campo :attribute es obligatorio.',
                'min'      => 'El campo :attribute no puede tener menos de :min carácteres.'
        );
        //bcrypt('123')
        $validation = Validator::make(Input::all(),$rules,$messages);

        if($validation->fails()){
            //return Redirect::to('password')->withErrors($validation)->withInput();
            return Redirect::to('/mal')->withErrors($validation)->withInput();
            flash('Upp! tenemos problem hiuuuustooonnn','warning');
        }
        else{
            if(Hash::check(Input::get('password'), Auth::user()->Password)){
                $usuario = new User();
                $usuario = Auth::user();
                $usuario->Password = Hash::make(Input::get('newpassword'));
                $usuario->save();

                if($usuario->save()){
                    //return Redirect::to('/')->with('notice', 'Nueva contraseña guardada de forma correcta!');
                    return Redirect::to('/');
                    flash('Nueva contraseña guardada de forma correcta!','success');
                }
                else
                {
                    //return Redirect::to('/')->with('notice', 'No se ha podido guardar la nueva contaseña!');
                    return Redirect::to('/');
                    flash('No se ha podido guardar la nueva contaseña!','danger');
                }
            }
            else
            {
                //return Redirect::to('/')->with('notice', 'La contraseña actual no es correcta')->withInput();
                return Redirect::to('/');
                flash('La contraseña actual no es correcta','warning');
            }

        }
    }


"createdRow" : function(row,data,index){
    if(data['tipo_incidente']=='tecnicoHS'){
        $('td:eq(3)',row).html('Hardware - Software');
    }
    if(data['estado']=='abierto'){
        $('td:eq(5)',row).html('<span class="form-control-static label label-success">Abierto</span>');
    }else{
        $('td:eq(5)',row).html('<span class="form-control-static label label-danger">Cerrado</span>');
    }
    if(data['id'] == 0){
        $('#contenedor_tabla').html('<h3>No hay incidentes registrados</h3>');
    }
}

<script>
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<td>Descripción:</td>'+
                        '<td>'+d.descripcion_incidente+'</td>'+
                    '</tr>'+
                '</table>';
    }

    $(document).ready(function() {
        var table = $('#tabla_miembro').DataTable( {
            "destroy":true,
            //"processing":true,
            //"serverSide": true,
            "ajax": {
                "url":"http://localhost/Laravel/SistemaIncidentes/public/incidente/tabla-miembro-ajax",
                "type": "GET",
                //"method": "GET",
                "dataType":"JSON"
            },
            //"ajax": "http://localhost/Laravel/SistemaIncidentes/public/incidente/lista-de-incidentes",
            "columns": [
                { "data": "id" },
                { "data": "apellido" },
                { "data": "name" },
                { "data": "tipo_incidente" },
                { "data": "prioridad" },
                { "data": "estado" },
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "defaultContent":"<button type='button' class='incidente_id btn btn-primary'>Ver incidente</button>"}
            ],
            "createdRow" : function(row,data,index){
                if(data['tipo_incidente'] == 'tecnicoHS'){
                    $('td:eq(3)',row).html('Hardware - Software');
                }else if(data['tipo_incidente'] == 'tecnicoRI'){
                    $('td:eq(3)',row).html('Red - Internet');
                }else if(data['tipo_incidente'] == 'admin'){
                    $('td:eq(3)',row).html('Consulta general');
                }else{
                    $('td:eq(3)',row).html('');
                }
                if(data['estado'] == 'abierto'){
                    $('td:eq(5)',row).html('<span class="form-control-static label label-success">Abierto</span>');
                }else if(data['estado'] == 'cerrado'){
                    $('td:eq(5)',row).html('<span class="form-control-static label label-danger">Cerrado</span>');
                }else{
                    $('td:eq(5)',row).html('-');
                }
                if(data['id'] == 0){
                    $('td:eq(0)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(1)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(2)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(3)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(4)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(5)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(6)',row).html('<span class="form-control-static label label-danger">-</span>');
                    $('td:eq(7)',row).html('<span class="form-control-static label label-danger">-</span>');
                }
                if(data['id'] == 0){
                    $('#contenedor_tabla').html('<h3>No hay incidentes registrados</h3>');
                }
            },
            "order": [[0, 'desc']],
            "language":{
                "url":"{{ asset('plugins/bootstrap/spanish.json') }}"
            }
        } );
        
        obtener_incidente_id("#tabla_miembro tbody",table)

        // Add event listener for opening and closing details
        $('#tabla_miembro tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );

    var obtener_incidente_id = function(tbody, table){
        $(tbody).on("click","button.incidente_id",function(){
            var data = table.row($(this).parents("tr")).data();
            var id = data.id;
            //console.log(id);
            var route = "http://localhost/Laravel/SistemaIncidentes/public/incidente/"+id+"/cometarios";
            //$.get(route);
            window.location.href = route;
        });
    }

</script>




<h2 class="text-center">Listado de Placas madres (Index)</h2>
<button onclick="registrar_modal()" class="btn btn-primary">Registrar placa </button>
<hr>

@extends('admin.plantilla.principal')
@section('titulo','Listado de Usuarios')
@section('contenido')

  <h2 class="text-center">Lista de usuarios</h2>
  <hr>
  <a href="{{route('user.crear')}}" class="btn btn-primary">Registrar Usuario</a> <a href="{{route('incidente.generar.pdp.usuarios')}}" class="btn btn-danger"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>

  <!-- Formulario para el buscador de Tags-->
    {!! Form::open (['route'=>'usuario.listar', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar Usuario...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
    {!! Form::close() !!}
    <!-- Fin Formulario para el buscador de Tags-->
    
  <hr>
  <!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
  @include('flash::message')
  
  <table class="table table-striped">
    <thead><div></div>
      <th>ID</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Correo eléctronico</th>
      <th>Tipo de usuario</th>
      <th>Oficina</th>
      <th>Área</th>
      <th>Acciones</th>
    </thead>
  
    <tbody>
      @foreach($usuarios as $usuario)
        <tr>
          <td>{{$usuario->id}}</td>
          <td>{{$usuario->apellido}}</td>
          <td>{{$usuario->name}}</td>
          <td>{{$usuario->email}}</td>
          @if($usuario->tipo == "admin")
            <td><span class="label label-success">{{"Administrador"}}</span></td>
          @elseif($usuario->tipo == "miembro")
            <td><span class="label label-default">{{"Miembro"}}</span></td>
          @elseif($usuario->tipo == "tecnicoHS")
            <td><span class="label label-primary">{{"Tecnico Hardware/Software"}}</span></td>
          @else
            <td><span class="label label-primary">{{"Tecnico Red/Internet"}}</span></td>
          @endif
          @if($usuario->oficina != null)
            <td>{{$usuario->oficina->oficina}}</td>
          @else
            <td>{{'Sin oficina'}}</td>
          @endif
          @if($usuario->oficina != null)
            <td>{{$usuario->oficina->area->nombre_area}}</td>
          @else
            <td>{{"Sin área"}}</td>
          @endif
          <td>
            <a href="{{route('admin.usuarios_crud.edit',$usuario->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
            <a href="{{route('usuario.borrar',$usuario->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you chure?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {!! $usuarios->render() !!}

@endsection



<div class="form-group @if($errors->has('tipo')) has-error @endif">
  {!! form::label('tipo','Tipo de Usuario:',['class'=>'col-sm-2 control-label']) !!}
  <div class="col-md-5">
    {!! form::select('tipo',['admin'=>'Administrador','miembro'=>'Miembro','tecnicoHS'=>'Hardware/Software','tecnicoRI'=>'Red/Internet'], null, ['class'=>'form-control', 'placeholder'=>'Seleccione el tipo de usuario']) !!}
    @if($errors->has('tipo'))
      <p class="help-block">{{$errors->first('tipo')}}</p> 
    @endif
  </div>
</div>

    /*
    public function listadoUsuariosAjax(){
        $usuarios = db::table('users as u')
            ->join('oficinas as o','u.oficina_id','=','o.id')
            ->join('areas as a','o.area_id','=','a.id')
            ->select('u.id','u.name','u.apellido','u.email','u.tipo','o.oficina','a.nombre_area')
            ->get();

        foreach($usuarios as $key => $value){
            $resources['data'][] = $value;
        }

        $resources_JASON_array = json_encode($resources);
        return $resources_JASON_array;
    }
    */

// Primera - tabla create_roles_table

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}


//Segunda Tabla - create_role_user_table

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_user');
    }
}

//Tercera tabla create_permissions_table

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('model')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}

//Cuarta tabla create_permission_role_table

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
    }
}

//Quinta tabla create_permission_user_table

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_user');
    }
}


//Sexta tabla 

?>


@if(! $errors->isEmpty())
    <div class="alert alert-danger">
        <p><strong>Peina!</strong> salto un error nae, fijate pue que puede ser</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::open(['route'=>'password.postEmail']) !!}
  <div class="form-group">
            {!! form::label('email','Correo electronico:',['class'=>'col-xs-2 control-label']) !!}
            {!! form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese Correo electronico...']) !!}
          </div>
    <br>
    <button class="btn btn-primary"> Enviar</button>
{!! Form::close() !!}

{!! Form::open(['route'=>'mail.store','method'=>'POST','class'=>'form-inline']) !!}
              <div class="form-group">
                    {!! form::label('nombre','De:',['class'=>'col-xs-2 control-label']) !!}
                    {!! form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese nombre...']) !!}
          </div>
          <div class="form-group">
                    {!! form::label('email','Correo electronico:',['class'=>'col-xs-2 control-label']) !!}
                    {!! form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese e-mail...']) !!}
          </div>
                {!! form::label('mensaje','Mensaje:',['class'=>'col-xs-2 control-label']) !!}
                {!! form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Escriba el mensaje...']) !!}
                <br>
                  <button class="btn btn-primary"> Enviar</button>
{!! Form::close() !!}

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null




<strong>N° Incidente: </strong>{{$incidente->id}} <br>
<strong>Usuario: </strong>{{$incidente->user->name}} {{$incidente->user->apellido}}<br>
@if($incidente->tipo_incidente == "tecnicoHS")
    <strong>Tipo de incidente: </strong>{{"Hardware/Software"}}<br>
@elseif($incidente->tipo_incidente == "tecnicoRI")
    <strong>Tipo de incidente: </strong>{{"Red/Internet"}}<br>
@else
    <strong>Tipo de incidente: </strong>{{"Consulta general"}}<br>
@endif
</div>
<strong>Prioridad: </strong>{{$incidente->prioridad}}<br>
<strong>Descripcion: </strong>{{$incidente->descripcion_incidente}}<br>



<a href="" onclick="registrar_modal()" class="btn btn-primary">Registrar placa</a>

<a href="{{route('placa.madre.borrar',$placa->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you chure?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>



@extends('admin.plantilla.principal')
@section('titulo','Listado de Marcas')
@section('contenido')

    <h2 class="text-center">Listado de Placas madres (Index)</h2>
    <a href="{{route('placa.madre.crear')}}" class="btn btn-primary">Registrar placa</a>
    <hr>
    <!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
    @include('flash::message')
    
    <table class="table table-striped">
        <thead><div></div>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Version</th>
            <th>Discponible</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($placas_madres as $placa)
                <tr>
                    <td>{{$placa->id}}</td>
                    <td>{{$placa->marca_placa}}</td>
                    <td>{{$placa->modelo_placa}}</td>
                    <td>{{$placa->version}}</td>
                    @if($placa->disponible == "si")
                        <td><span class="label label-success">{{$placa->disponible}}</span></td>
                    @else
                        <td><span class="label label-default">{{$placa->disponible}}</span></td>
                    @endif
                    <td>
                        <a href="{{route('placa.madre.editar',$placa->id)}}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                        <a href="{{route('placa.madre.borrar',$placa->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you chure?')"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $placas_madres->render() !!}

@endsection



        <ul class="nav navbar-nav">
          @if(Auth::user()->tipo == 'admin' || 'miembro')
            <!-- <li><a href="{{url('/')}}" class="dropdown-toggle">Página principal</a></li> -->
          @else
            <li><a href="{{route('admin.autenticacion.login')}}" class="dropdown-toggle">Iniciar sesión</a></li>
          @endif
        </ul>

  table{
  border:1px solid #333;
  width: 100%;
}

td{
  padding:5px;
  text-align: left;
}

table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

.texto_derecha{
  text-align: right;
}

header {
  display:block;
  background:#ccc;
  padding:10px 0px;
}

footer {
  position: relative;
  /* Altura total del footer en px con valor negativo */
  margin-top: -50px;
  /* Altura del footer en px. Se han restado los 5px del margen
     superior mas los 5px del margen inferior
  */
  height: 40px;
  padding:5px 0px;
  clear: both;
  background: grey;
  text-align: center;
  color: #fff;
}

.define {
  width:960px;
  margin:0 auto;
}

    <!-- Formulario para el buscador de Tags-->
    {!! Form::open (['route'=>'admin.usuarios.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar Usuario...', 'aria-describedby'=>'search']) !!}
            <!-- <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span> -->
        </div>
        {!! form::submit('Buscar',['class'=>'btn btn-default']) !!}
    {!! Form::close() !!}
    <!-- Fin Formulario para el buscador de Tags-->


<div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span> Registrar Usuario</h3>
        </div>

        <div class="panel-body">

            {!! Form::open(['route'=>['admin.usuarios_crud.store'],$oficinas,'method'=>'POST','role'=>'form','class'=>'form-horizontal col-md-12']) !!}

                <div class="form-group">
                    {!! form::label('username','Cuenta de usuario:',['class'=>'col-sm-2 control-label','for'=>'inputEmail3']) !!}
                    <div class="col-sm-10">
                        {!! form::text('username',null,['class'=>'form-control','placeholder'=>'Ingrese la cuenta del usuario...','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! form::label('password','Contraseña:',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! form::password('password',['class'=>'form-control','placeholder'=>'Contraseña','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! form::label('tipo','Tipo de Usuario:',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        {!! form::select('tipo',['admin'=>'Administrador','miembro'=>'Miembro','tecnicoHS'=>'Hardware/Software','tecnicoRI'=>'Red/Internet'], null, ['class'=>'form-control', 'placeholder'=>'Seleccione el tipo de usuario', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! form::label('name','Nombre:',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese nombre...','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! form::label('apellido','Apellido:',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese apellido...','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! form::label('email','Correo electrónico:',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! form::email('email',null,['class'=>'form-control','placeholder'=>'Ingres correo electronico...','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Oficina</label>
                    <div class="col-md-5">
                        <select name="id_oficina" class="form-control" required>
                            <option value="null">Seleccione la oficina...</option>
                            @foreach($oficinas as $oficina)
                                <option value="{{$oficina->id}}">{{ $oficina->oficina }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Resgistrar</button>
                <a href="{{route('usuario.listar')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>


            {!! Form::close() !!}

        </div>
    </div>


SELECT d.nombre_area, count(d.nombre_area) FROM `incidentes` as a join users as b on a.user_id = b.id join oficinas as c on b.oficina_id = c.id join areas as d on c.area_id = d.id GROUP BY d.nombre_area
SELECT d.nombre_area, COUNT(a.id) FROM `incidentes` as a join users as b on a.user_id = b.id join oficinas as c on b.oficina_id = c.id RIGHT JOIN areas as d on c.area_id = d.id GROUP BY d.nombre_area

//Torta tipo estado
                var incidentePorEstado = ec.init(document.getElementById('incidente_por_estado'));
                var option = {
                        title : {
                            text: 'Incidente',
                            subtext: 'Por estado',
                            x:'center'
                        },
                        tooltip : {
                            trigger: 'item',
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
                        },
                        legend: {
                            orient : 'vertical',
                            x : 'left',
                            data:[]
                        },
                        toolbox: {
                            show : true,
                            feature : {
                                dataView : {show: true, readOnly: false, title: 'info', lang: ['info', 'cancelar', 'actualizar']},
                                magicType : {
                                    show: true, 
                                    type: ['pie', 'funnel'],
                                    option: {
                                        funnel: {
                                            x: '25%',
                                            width: '50%',
                                            funnelAlign: 'left',
                                            max: 1548
                                        }
                                    }
                                },
                                restore : {show: true},
                                saveAsImage : {show: true}
                            }
                        },
                        calculable : true,
                        series : [
                            {
                                name:'incidente',
                                type:'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[]
                            }
                        ]
            };

            $.get('estadisticas-por-estado',function(data){
                var x = JSON.parse(data);
                //alert(x[1]['cantidad']);

                $.each(x,function(k,v){
                    var nombre;
                    v['estado']
                    if (v['estado'] === 'abierto') {
                        nombre = 'Abierto';
                    } else {
                        nombre = 'Cerrado';
                    }
                    option.legend.data.push(
                        nombre
                    );
                    option.series[0].data.push(
                        {value:v['cantidad'], name:nombre}
                    );
                });

                incidentePorEstado.setOption(option);
            });

        });

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.7/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js -->
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
    
{"data":null,
    "defaultContent":"<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#myModal' 
                                onclick='obtener_data_editar;habilitarbtn()'>
                                <span class='glyphicon glyphicon-edit'></span>
                      </button>
                      <button type='button' class='btn btn-info'>
                            <span class='glyphicon glyphicon-eye-open'></span>
                      </button>"}

{ "defaultContent":"<button type='button' class='btn btn-primary'>Tratar incidente</button>"}


    $(document).on("ready",function(){
        load_tecnico();
    }); 

    var load_tecnico = function(){
        var table = $('#tabla_tecnico').DataTable({
            "destroy":true,
            "order":[[0,"asc"]],
            "language":{
                "url":"{{ asset('plugins/bootstrap/spanish.json') }}"
            },
            "ajax":{
                "method":"GET",
                "url": "http://localhost/Laravel/SistemaIncidentes/public/incidente/tabla-tecnico-ajax",
                "dataType": "JSON"
            },
            "columns":[
                {"data":'id'},
                {"data":'apellido'},
                {"data":'name'},
                {"data":'tipo_incidente'},
                {"data":'prioridad'},
                {"data":'estado'},
                {"data":'descripcion_incidente'}

            ]
        });
    }


SELECT u.id, u.name, u.apellido, i.tipo_incidente, i.prioridad, i.estado, i.descripcion_incidente FROM incidentes_usuarios AS iu INNER JOIN users AS u ON iu.user_id = u.id INNER JOIN incidentes AS i ON iu.incidente_id = i.id


@extends('admin.plantilla.principal')
@section('titulo','Listado de incidentes')
@section('contenido')

    <h2 class="text-center">Listado de Incidentes Miembro (Index Miembro)</h2>

    <!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
    @include('flash::message')
    
    @if(Auth::user()->tipo == "miembro")
        <div class="form-group">
            <a href="{{route('incidente.crear')}}" class="btn btn-primary"> Registrar incidente</a>
        </div>
    <hr>
    @endif
    
    @foreach($incidente_consulta as $incidente)
        <div class="form-horizontal">

            <div class="form-group">
                <label class="control-label col-sm-2">Id:</label>
                <div class="col-sm-10"> 
                    <p class="form-control-static">{{$incidente->id}}</p></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Usuario:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->user->name}} {{$incidente->user->apellido}}</p> </div>
            </div>

            <div class="form-group">
                @if($incidente->tipo_incidente == "tecnicoHS")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10"> 
                        <p class="form-control-static">{{"Hardware - Software"}} </p>
                    </div>
                @elseif($incidente->tipo_incidente == "tecnicoRI")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Red - Internet"}}</p>
                    </div>
                @else
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Consulta general"}}</p>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2"> Prioridad:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->prioridad}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Estado:</label> 
                <div class="col-sm-10">
                    @if($incidente->estado == "abierto")
                        <p class="form-control-static label label-success">{{"Abierto"}}</p>
                    @else
                        <p class="form-control-static label label-danger">{{"Cerrado"}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Descripcion:</label> 
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->descripcion_incidente}}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <a href="{{route('comentario.crear',$incidente->id)}}" class="btn btn-info">Tratar incidente</a>
                </div>
            </div>
            
            <hr>
        </div>
    @endforeach

@endsection



@foreach($incidente_consulta as $incidente)
    
        <div class="form-horizontal">

            <div class="form-group">
                <label class="control-label col-sm-2">Id (incidente):</label>
                <div class="col-sm-10"> 
                    <p class="form-control-static">{{$incidente->id}}</p></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Usuario:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->incidentes->first()->user->name}} {{$incidente->incidentes->first()->user->apellido}}</p> </div>
            </div>

            <div class="form-group">
                @if($incidente->tipo_incidente == "tecnicoHS")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10"> 
                        <p class="form-control-static">{{"Hardware - Software"}} </p>
                    </div>
                @elseif($incidente->tipo_incidente == "tecnicoRI")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Red - Internet"}}</p>
                    </div>
                @else
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Consulta general"}}</p>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2"> Prioridad:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->prioridad}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Estado:</label> 
                <div class="col-sm-10">
                    @if($incidente->estado == "abierto")
                        <p class="form-control-static label label-success">{{"Abierto"}}</p>
                    @else
                        <p class="form-control-static label label-danger">{{"Cerrado"}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Descripcion:</label> 
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->descripcion_incidente}}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <a href="{{route('comentario.crear',$incidente->incidentes[0]->id)}}" class="btn btn-info">Tratar incidente</a>
                </div>
            </div>
            
            <hr>
        </div>
    @endforeach


    <div class="form-horizontal">

        <div class="form-group">
            <label class="control-label col-sm-3">Cantidad de incidentes:</label>
            <div class="col-sm-1">
                <p class="form-control-static">{{count($incidente_consulta)}}</p>
            </div>
            
            {!! Form::open(['route'=>'incidente.listado.miembros.post', 'method'=>'POST','class'=>'form-horizontal']) !!}
                
                <div class="col-sm-1">
                    {!! form::label('tipo_incidente','Tipo incidente:',['class'=>'control-label']) !!}
                </div>
                <div class="col-sm-3">
                    {!! form::select('tipo_selec',['tecnicoHS'=>'Hardware - Software','tecnicoRI'=>'Red - Internet','admin'=>'Consulta general'],null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary"> Buscar</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
    <hr>

public function listadoIncidensteMiembros(Request $request){

        //$incidentes = Incidente_Usuario::orderBy('id','DES')->paginate(10);
        //dd($request->all());
        $tipo = Auth::user()->tipo;
        $user_id = Auth::user()->id;
        //dd($user_id);
        
        if($tipo == "miembro"){
            //$incidente_consulta = Incidente_Usuario::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
            //SELECT * FROM incidentes_usuarios as a JOIN incidentes as b ON a.incidente_id = b.id AND b.estado = "cerrado" WHERE a.user_id = 6 
            //dd($request->all());
            //
            if($request->estado_selec == " "){
                $incidente_consulta = Incidente_Usuario::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
                //dd($incidente_consulta);
                //
                return view('admin/incidente/index_incidente',compact('incidente_consulta'));

            }elseif($request->estado_selec == "todo"){
                $incidente_consulta = Incidente_Usuario::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
                //dd($incidente_consulta);
                //
                return view('admin/incidente/index_incidente',compact('incidente_consulta'));

            }elseif($request->estado_selec == "abierto"){
                $consulta_estado = db::table('incidentes_usuarios as a')
                    ->join('incidentes as b', 'a.incidente_id','=','b.id')
                    //->join('users as c', 'c.id', '=', 'a.user_id')
                    //->join('incidentes_usuarios', 'users.id', '=', 'orders.user_id')
                    ->select('a.*')
                    ->where('a.user_id',$user_id)
                    ->where('b.estado',$request->estado_selec)
                    ->get();
                //dd($consulta_estado);

                $arreglo = array();
                //dd($consulta_estados_abiertos);
                foreach($consulta_estado as $estado){
                    $incidente_consulta = Incidente_Usuario::where('id',$estado->id)->get();
                    //dd($incidente_consulta);
                    $arreglo = $incidente_consulta;
                    //dd($arreglo);
                }
                dd($arreglo);
                
                //dd($incidente_consulta);
               
                //dd($consulta_estados_abiertos);
                //$incidente_consulta = Incidente_Usuario::whereIn('id',$consulta_estados_abiertos());
                //dd($incidente_consulta->get());
                //return view('admin/incidente/index_incidente_estado_abierto')->with('incidente_consulta',$incidente_consulta);
                return view('admin/incidente/index_incidente_estado_abierto',compact('consulta_estado'));

            }elseif($request->estado_selec == "cerrado"){
                $incidente_consulta = db::table('incidentes_usuarios as a')
                    ->join('incidentes as b', 'a.incidente_id','=','b.id')
                    ->join('users as c', 'c.id', '=', 'a.user_id')
                    //->join('incidentes_usuarios', 'users.id', '=', 'orders.user_id')
                    ->select('a.*','b.*','c.*')
                    ->where('a.user_id',$user_id)
                    ->where('b.estado',$request->estado_selec)
                    ->get();
                //dd($incidente_consulta);
                
                return view('admin/incidente/index_incidente')->with('incidente_consulta',$incidente_consulta);
                //return view('admin/incidente/index_incidente',compact('incidente_consulta'));  

            }else{
                $incidente_consulta = db::table('incidentes_usuarios as a')
                ->join('incidentes as b', 'a.incidente_id','=','b.id')
                //->join('incidentes_usuarios', 'users.id', '=', 'orders.user_id')
                ->select('a.*','b.*')
                ->where('a.user_id',$user_id)
                ->where('b.estado',$request->estado_selec)
                ->get();
                //dd($incidente_consulta);
                
                return view('admin/incidente/index_incidente',compact('incidente_consulta'));
            }

            //dd($incidente_consulta);

            //return view('admin/incidente/index_incidente',compact('incidente_consulta'));
        //}else{
        //    $incidente_consulta = Incidente::where('tipo_incidente',$tipo)->get();

        //    return view('admin/incidente/index_incidente',compact('incidente_consulta'));
        }
    }


<div class="form-group">
                @if($incidente->incidente->tipo_incidente == "tecnicoHS")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10"> 
                        <p class="form-control-static">{{"Hardware - Software"}} </p>
                    </div>
                @elseif($incidente->incidente->tipo_incidente == "tecnicoRI")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Red - Internet"}}</p>
                    </div>
                @else
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Consulta general"}}</p>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2"> Prioridad:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->incidente->prioridad}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Estado:</label> 
                <div class="col-sm-10">
                    @if($incidente->incidente->estado == "abierto")
                        <p class="form-control-static label label-success">{{"Abierto"}}</p>
                    @else
                        <p class="form-control-static label label-danger">{{"Cerrado"}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Descripcion:</label> 
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->incidente->descripcion_incidente}}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <a href="{{route('comentario.crear',$incidente->id)}}" class="btn btn-info">Tratar incidente</a>
                </div>
            </div>



        @if($comentarios_consulta)
            @foreach($comentarios_consulta as $comentario)
                <div class="well">
                    <p>{{$comentario->incidenteUsuario->user->name}} {{$comentario->incidenteUsuario->user->apellido}}</p>

                    <p>{{$comentario->comentario}}</p>
                </div>
            @endforeach

    
    @foreach($incidente_consulta as $incidente)
        
        <div class="form-horizontal">

            <div class="form-group">
                <label class="control-label col-sm-2">Id:</label>
                <div class="col-sm-10"> 
                    <p class="form-control-static">{{$incidente->id}}</p></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Usuario:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->user->name}} {{$incidente->user->apellido}}</p> </div>
            </div>

            <div class="form-group">
                @if($incidente->incidente->tipo_incidente == "tecnicoHS")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10"> 
                        <p class="form-control-static">{{"Hardware - Software"}} </p>
                    </div>
                @elseif($incidente->incidente->tipo_incidente == "tecnicoRI")
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Red - Internet"}}</p>
                    </div>
                @else
                    <label class="control-label col-sm-2">Tipo de incidente:</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{"Consulta general"}}</p>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2"> Prioridad:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->incidente->prioridad}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Estado:</label> 
                <div class="col-sm-10">
                    @if($incidente->incidente->estado == "abierto")
                        <p class="form-control-static label label-success">{{"Abierto"}}</p>
                    @else
                        <p class="form-control-static label label-danger">{{"Cerrado"}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Descripcion:</label> 
                <div class="col-sm-10">
                    <p class="form-control-static">{{$incidente->incidente->descripcion_incidente}}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <a href="{{route('comentario.crear',$incidente->id)}}" class="btn btn-info">Tratar incidente</a>
                </div>
            </div>
            <hr>
        </div>
    @endforeach

 //SELECT * from comentarios WHERE incidente_usuario_id IN (SELECT id FROM incidentes_usuarios WHERE incidente_id = 29) ORDER by id ASC 

            $subconsulta = db::table('incidentes_usuarios')->SELECT('id')->whereRaw('incidente_id ='.$incidente_usuario->incidente_id);
            //dd($subconsulta);
            //dd($subconsulta[0]->id);
            $consulta = db::table('Comentarios')
                ->where(db::raw("incidente_usuario_id=(".$subconsulta->toSql().")"))
                ->get();
            dd($consulta);

            DB::table('users')
                ->whereIn('id', function($query)
                {
                    $query->select(DB::raw(1))
                          ->from('orders')
                          ->whereRaw('orders.user_id = users.id');
                })
                ->get();


    public function store(Request $request){
        //dd($request->all());

        $coment = new Comentario();
        //$coment->comentario = $request->comentario;
        $id_usuario = Auth::user()->id;
        //dd($id_usuario);
        //$incidente_usuario_actual = Incidente_Usuario::find($id_usuario);
        //$incidente_usuario_actual = Incidente_Usuario::where('user_id',$id_usuario);
        //$valor_in = $request->incidente_usuario_id;
        $consultas = DB::table('incidentes_usuarios')->get();
        //dd($consultas);
        //dd($request->incidente_usuario_id);
        foreach($consultas as $consulta){
            if($consulta->user_id == $id_usuario and $consulta->incidente_id == $request->incidente_usuario_id){
                //dd($consulta);
                $coment->comentario = $request->comentario;
                $coment->incidente_usuario_id = $consulta->id;
                //dd($coment);
                $coment->save();
                //dd($coment);
                return redirect()->route('comentario.crear',$consulta->id);
            }
            else{
                "no hay un choten";
            }
        }
          //dd($incidente_usuario_actual->get());
        //$incidente_usuario_actual_arreglo = $incidente_usuario_actual->get();
          //dd($incidente_usuario_actual_arreglo);
          //dd($incidente_usuario_actual_arreglo->last()->incidente_id);
          //$coment->incidente_usuario_id = $request->incidente_usuario_id;
        //$coment->incidenteUsuario()->associate($incidente_usuario_actual_arreglo);
          //dd($coment->incidente_usuario_id);
        //$coment->incidente_usuario_id = $incidente_usuario_actual_arreglo->last()->incidente_id;
          //dd($coment);
        //$coment->save();

        //$incidente_usuario = Incidente_Usuario::find($request->incidente_usuario_id);
        //$incidente_usuario = Incidente_Usuario::find($incidente_usuario_actual->first()->id);
        //dd($incidente_usuario);
        //return redirect()->route('comentario.crear',$request->incidente_usuario_id);
        //dd($consulta->id);
        //return redirect()->route('comentario.crear',$consulta->id);
        //return view('admin/comentarios/crear_comentario',compact('incidente_usuario'));
    }


    public function create($id){

        if(Auth::user()->tipo == "miembro"){
            $incidente_usuario     = Incidente_Usuario::find($id);
            //dd('soy miembro');
            //dd($incidente_usuario->user->tipo);
            $comentarios_consulta  = Comentario::where('incidente_usuario_id',$id)->get();
            //dd($comentarios_consulta);
            $id_2 = $id+1;
            $comentarios_consulta2 = Comentario::where('incidente_usuario_id',$id_2)->get();
            return view('admin/comentarios/crear_comentario',compact('incidente_usuario','comentarios_consulta','comentarios_consulta2'));
        }else{
            $comentarios_consulta  = Comentario::where('incidente_usuario_id',$id)->get();
            //dd($comentarios_consulta);
            $id_2 = $id-1;
            $comentarios_consulta2 = Comentario::where('incidente_usuario_id',$id_2)->get();
            //dd($comentarios_consulta2);
            return view('admin/comentarios/crear_comentario',compact('incidente_usuario','comentarios_consulta','comentarios_consulta2'));
        }
        
        
        //$comentarios = Comentario::all();
        //dd($comentarios_consulta);
        //return view('admin/comentarios/crear_comentario',compact('incidente_usuario','comentarios_consulta','comentarios_consulta2'));
        
    }


    public function create($id){

        if(Auth::user()->tipo_incidente == "miembro"){
            $incidente_usuario    = Incidente_Usuario::find($id);
            $comentarios_consulta = Comentario::where('incidente_usuario_id',$id)->get();
            return view('admin/comentarios/crear_comentario',compact('incidente_usuario','comentarios_consulta'));
        }else{
            $incidente_usuario     = Incidente_Usuario::find($id);
            $comentarios_consulta  = Comentario::where('incidente_usuario_id',$id)->get();
            $id_2 = $id+1;
            $comentarios_consulta2 = Comentario::where('incidente_usuario_id',$id_2)->get();
            //$comentarios = Comentario::all();
            //dd($comentarios_consulta);
            return view('admin/comentarios/crear_comentario',compact('incidente_usuario','comentarios_consulta','comentarios_consulta2'));
        }
        
    }


    public function create($id){

        $incidente_usuario = Incidente_Usuario::find($id);
        $comentarios_consulta = Comentario::where('incidente_usuario_id',$id)->get();
        $id_2 = $id+1;
        $comentarios_consulta2 = Comentario::where('incidente_usuario_id',$id_2)->get();
        //$comentarios = Comentario::all();
        //dd($comentarios_consulta);
        return view('admin/comentarios/crear_comentario',compact('incidente_usuario','comentarios_consulta','comentarios_consulta2'));
    }


    public function listadoIncidensteMiembros(){

        //$incidentes = Incidente_Usuario::orderBy('id','DES')->paginate(10);
        
        $tipo = Auth::user()->tipo;
        
        if($tipo == "miembro"){
            $incidente_consulta = Incidente_Usuario::where('user_id',Auth::user()->id)->get();
            
            return view('admin/incidente/index_incidente',compact('incidente_consulta'));
        }else{
            $incidente_consulta = Incidente::where('tipo_incidente',$tipo)->get();

            return view('admin/incidente/index_incidente',compact('incidente_consulta'));
        }
    }


public function listadoIncidentesTecnicos(){

        $tipo = Auth::user()->tipo;

        $incidente_query = Incidente::where('tipo_incidente',$tipo)->get();

        return view('admin/incidente/listado_incidentes_tecnicos',compact('incidente_query'));

    }


	@foreach($incidente_query as $incidentes)
			Id:{{$incidentes->id}}<br>
			Usuario: {{$incidentes->incidentes->first()->user->name}}<br>
			Tipo de incidente:{{$incidentes->tipo_incidente}}<br>
			Prioridad: {{$incidentes->prioridad}}<br>
			Estado: {{$incidentes->estado}}<br>
			Descripcion:{{$incidentes->descripcion_incidente}}<br>
			<hr>
	@endforeach



        //dd($tipo);
        //$user = DB::table('users')->where('name', 'John')->first();
        //$users = DB::table('users')->select('name', 'email as user_email')->get();
        //SELECT * FROM incidentes as a INNER JOIN incidentes_usuarios as b ON a.id = b.incidente_id WHERE a.tipo_incidente = "tecnicoHS" 

        //$consulta_incidentes = db::select('select * FROM incidentes where tipo_incidente = ?', [$tipo]);
        //$consulta_incidente = db::table('incidentes')->select('tipo_incidente',$tipo)->get();
        
        /*
        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
        */

        /*
        $incidentes_usuarios = db::table('incidentes as a')
            ->join('incidentes_usuarios as b', 'a.id','=','b.incidente_id')
            //->join('incidentes_usuarios', 'users.id', '=', 'orders.user_id')
            ->select('a.*','b.*')
            ->where('a.tipo_incidente','=',$tipo)
            ->get();
        */
       
        //$incidente_query = Incidente_Usuario::where('user_id',$tipo)->get();
        
        /*
        $incidente_query->each(function($incidente_query){
            $incidente_query->incidentes;
        });
        */
       
       //$incidente_query = Incidente::with(['tipo_incidente'=>function($query){$query->where'tipo_incidente','=',$tipo})])->get();
       
        //dd($incidente_query);


	@foreach($incidentes_usuarios as $incidentes)
		@foreach($users as $user)
			@if($incidentes->user_id == $user->id)
				Id:{{$user->id}}<br>
			@endif
				Usuario: {{$user->name}}<br>
				Tipo de incidente:{{$incidentes->tipo_incidente}}<br>
				Prioridad: {{$incidentes->prioridad}}<br>
				Descripcion:{{$incidentes->descripcion_incidente}}<br>
		<hr>
		@endforeach
	@endforeach



@extends('admin.plantilla.principal')
@section('titulo','Listado de incidentes')
@section('contenido')

	<h2 class="text-center">Listado de Incidentes (Index)</h2>
	<a href="{{route('incidente.crear')}}" class="btn btn-primary">Registrar incidente</a>
	<hr>
	<!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
	@include('flash::message')

	@foreach($incidente as $incidente)
		<div>
			<strong>Usuario:</strong> {{$incidente->user->name.' '.$incidente->user->apellido}}
			<br>
			<strong>Tipo de incidente:</strong>
				@if($incidente->incidente->tipo_incidente == "tecnicoRI")
					{{"Red-Internet"}}
				@elseif ($incidente->incidente->tipo_incidente == "tecnicoHS")
					{{"Hardware-Software"}}
				@else
					{{"Consulta general"}}
				@endif
			<br>
			<strong>Prioridad:</strong> {{$incidente->incidente->prioridad}}
			<br>
		</div>
		<div>
			<strong>Desciprcíon:</strong>
			<div>{{$incidente->incidente->descripcion_incidente}}</div>
		</div>
		<hr>
	@endforeach
	{!! $incidentes->render() !!}

@endsection




if($request->nombre_equipo != $$request->id_nombre_anterior){
            $equipo = new Equipo();
            $equipo->nombre_equipo = $request->id_nombre_anterior;
            $equipo->so = $request->so;
            $equipo->descripcion = $request->descripcion;

            if($request->usuario_id != $request->id_usuario_anterior){
                $usuario = User::find($request->usuario_id);
                $equipo->usuario()->associate($usuario);
                //$equipo->save();
            }else{
                $equipo->save();
            }
        }else{
            $equipo = new Equipo();
            $equipo->so = $request->so;
            $equipo->descripcion = $request->descripcion;

            if($request->usuario_id != $request->id_usuario_anterior){
                $usuario = User::find($request->usuario_id);
                $equipo->usuario()->associate($usuario);
                //$equipo->save();
            }else{
                $equipo->save();
            }
        }


else{
    $id_procesador = Procesador::find($request->id_procesador);
    $id_procesador->disponible = "no";
    $id_procesador->equipo()->associate($equipo);
    $id_procesador->save();
}			

else{
    $memoria = MemoriaRam::find($request->id_memoria);
    $memoria->disponible = "si";
    $memoria->equipo()->associate($equipo);
    $memoria->save();
}

else{
    $disco = DiscoDuro::find($request->id_disco);
    $disco->disponible = "si";
    $disco->equipo()->associate($equipo);
    $disco->save();
}

}else{
    $impresora = Impresora::find($request->id_impresora);
    $impresora->disponible = "no";
    $impresora->equipo()->associate($equipo);
    $impresora->save();
}

else{
    $fuente = Fuente::find($request->id_fuente);
    $fuente->disponible = "no";
    $fuente->equipo()->associate($equipo);
    $fuente->save();
}

}else{
    $ip = Ip::find($request->id_ip);
    $ip->disponible = "no";
    $ip->equipo()->associate($equipo);
    $ip->save();
}





<div class="form-group">
	{!! form::label('nombre','Nombre:',['class'=>'col-xs-2 control-label']) !!}
	<div class="col-md-6">
		{!! form::text('nombre',$equipo->nombre,['class'=>'form-control', 
									  'placeholder'=>'Ingrese nombre (Ej:PC-001)...']) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Usuario</label>
	<div class="col-md-6">
		<select name="id_usuario" class="form-control" required>
			<option value="{{ $equipo->usuario->id }}">{{$equipo->usuario->apellido.' '.$equipo->usuario->name}}</option>
			@foreach($usuarios as $usuario)
				<option value="{{ $usuario->id }}">{{$usuario->apellido.' '.$usuario->name}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Placa madre</label>
	<div class="col-md-6">
		<select name="id_placa" class="form-control" required>
			<option value="{{ $equipo->placaMadre->id }}">{{$equipo->placaMadre->marca.' '.$equipo->placaMadre->modelo}}</option>
			@foreach($placas as $placa)
				@if($placa->disponible == "si")
					<option value="{{$placa->id}}">{{ $placa->marca.' - '.$placa->modelo }}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Memoria</label>
	<div class="col-md-6">
		<select name="id_memoria" class="form-control" required>
			<option value="{{ $equipo->memoriasRam->id }}">{{$equipo->memoriasRam->marca.' '.$equipo->memoriasRam->capacidad}}</option>
			@foreach($memorias as $memoria)
				@if($memoria->disponible == "si")
					<option value="{{$memoria->id}}">{{ $memoria->marca.' - '.$memoria->capacidad }}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Disco</label>
	<div class="col-md-6">
		<select name="id_disco" class="form-control" required>
			<option value="{{ $equipo->discosDuros->id }}">{{$equipo->discosDuros->marca.' '.$equipo->discosDuros->capacidad.' '.$equipo->discosDuros->interface}}</option>
			@foreach($discos as $disco)
				@if($disco->disponible == "si")
					<option value="{{$disco->id}}">{{ $disco->marca.' - '.$disco->capacidad.' - '.$disco->interface}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	{!! form::label('so','Sistema Operativo:',['class'=>'col-xs-2 control-label']) !!}
	<div class="col-md-6">
		{!! form::select('so',['Windows XP 32-bit'=>'Windows XP 32-bit',
								'Windows 7 32-bit'=>'Windows 7 32-bit',
								'Windows 7 64-bit'=>'Windows 7 64-bit',
								'Windows 8 32-bit'=>'Windows 8 32-bit',
								'Windows 8 64-bit'=>'Windows 8 64-bit',
								'Windows 8.1 32-bit'=>'Windows 8.1 32-bit',
								'Windows 8.1 64-bit'=>'Windows 8.1 64-bit',
								'Windows 10 64-bit'=>'Windows 10 64-bit',
								'Linux Ubuntu 16.0.2'=>'Linux Ubuntu 16.0.2'],
								$equipo->so, 
								['class'=>'form-control', 
								'placeholder'=>'Seleccione sistema operativo...', 
								'required']) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Ip</label>
	<div class="col-md-6">
		<select name="id_ip" class="form-control" required>
			@foreach($ips as $ip)
				@if($ip->disponible == "si")
					<option value="{{$ip->id}}">{{ $ip->direccion }}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Fuente</label>
	<div class="col-md-6">
		<select name="id_fuente" class="form-control" required>
			<option value="{{ $equipo->fuente->id }}">{{$equipo->fuente->marca.' '.$equipo->fuente->modelo.' '.$equipo->fuente->capacidad}}</option>
			@foreach($fuentes as $fuente)
				@if($fuente->disponible == "si")
					<option value="{{$fuente->id}}">{{ $fuente->marca.' - '.$fuente->modelo.' - '.$fuente->capacidad}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Impresora</label>
	<div class="col-md-6">	
		<select name="id_impresora" class="form-control" requi	red>
			<option value="{{ $equipo->fuente->id }}">{{$equip	o->impresoras->marca.' '.$equipo->impresoras->modelo.' '.$equipo->impresoras->tipo}}</option>	
			@foreach($impresoras as $impresora)	
				@if($impresora->disponible == "si")	
					<option value="{{$impresora->id}}">{{ $impresora->marca.' - '.$impresora->modelo.' - '.$impresora->tipo}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	{!! form::label('descripcion','Descripción adicional:',['class'=>'col-xs-2 control-label']) !!}
	<div class="col-md-6">
		{!! form::textarea('descripcion',$equipo->descripcion,['class'=>'form-control', 
												'placeholder'=>'Ingrese alguna descripcion adiciona...']) 
		!!}
	</div>
</div>