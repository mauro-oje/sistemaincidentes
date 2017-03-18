<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Bican\Roles\Models\Role;
use App\Oficina;
use App\Equipo;

class UserController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $usuarios = User::orderBy('id','DES')->paginate(10);
        
        return view('admin/usuarios/index_usuarios',compact('usuarios'));
    }

    public function listar_usuarios(Request $request){
        //$usuarios = User::orderBy('id','DES')->paginate(10);
        $usuarios = User::buscar(request()->name)->orderBy('id','ASC')->paginate(10);

        return view('admin/usuarios/index_usuarios',compact('usuarios'));
    }

    public function listarUsuariosHS(Request $request){
        $usuarios = User::buscar(request()->name)->orderBy('id','ASC')->paginate(10);
        return view('tecnicoHS/usuarios/index_usuarios',compact('usuarios'));
    }

    public function listarUsuariosRI(Request $request){
        $usuarios = User::buscar(request()->name)->orderBy('id','ASC')->paginate(10);
        return view('tecnicoRI/usuarios/index_usuarios',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $oficinas = Oficina::all();
        $roles = Role::all();
        //dd($roles[0]->id);
        /*
        $oficinas->each(function($oficinas){
            $oficinas->area;
        });
        */
        return view('admin/usuarios/crear_usuarios',compact('oficinas','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){

        $usuario = new User();

        if($request->id_oficina != 'null'){
            
            $oficina_num                = Oficina::find($request->id_oficina);
            $usuario->username          = $request->username;
            $usuario->password          = bcrypt($request->password);
            if($request->tipo == 1){
                $usuario->tipo = "admin";
            }elseif($request->tipo == 2){
                $usuario->tipo  = "tecnicoHS";
            }elseif($request->tipo == 2){
                $usuario->tipo ="tecnicoRI";
            }else{
                $usuario->tipo = "miembro";
            }
            $usuario->name              = $request->name;
            $usuario->apellido          = $request->apellido;
            $usuario->email             = $request->email;
            $usuario->oficina()->associate($oficina_num);
            
            $usuario->save();
            $usuario_rol = User::find($usuario->id);
            $usuario_rol->attachRole($request->tipo);

            flash('El usuario "'.$usuario->apellido.', '.$usuario->name.' se ha registrado de forma correcta!','success');

            return redirect()->route('usuario.listar');

        }else{
            $usuario->username          = $request->username;
            $usuario->password          = bcrypt($request->password);
            if($request->tipo == 1){
                $usuario->tipo = "admin";
            }elseif($request->tipo == 2){
                $usuario->tipo  = "tecnicoHS";
            }elseif($request->tipo == 2){
                $usuario->tipo ="tecnicoRI";
            }else{
                $usuario->tipo = "miembro";
            }
            $usuario->name       = $request->name;
            $usuario->apellido   = $request->apellido;
            $usuario->email      = $request->email;
            $usuario->oficina_id = $request->oficina_id;

            $usuario->save();
            $usuario_rol = User::find($usuario->id);
            $usuario_rol->attachRole($request->tipo);

            flash('El usuario "'.$usuario->apellido.', '.$usuario->name.' se ha registrado de forma correcta!','success');

            return redirect()->route('usuario.listar');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $usuario = User::find($id);
        $equipo = Equipo::where('user_id',$id)->get();

        return view('admin/usuarios/show_usuario',compact('usuario','equipo'));
    }

    public function getEquipo($id){

        $equipo = Equipo::find($id);
        $usuario = User::find($equipo->user_id);

        return view('admin/usuarios/equipo',compact('equipo','usuario'));

    }

    public function miEquipo($id){

        $equipo = Equipo::where('user_id',$id)->get();

        return view('admin/usuarios/equipo_usuario',compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $usuario = User::find($id);
        $oficinas = Oficina::all();

        return view('admin.usuarios.editar_usuario',compact('usuario','oficinas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $usuario = User::find($id);
        $oficina = Oficina::find($request->oficina);
        
        $usuario->username      = $request->username;
        $usuario->tipo          = $request->tipo;
        $usuario->name          = $request->name;
        $usuario->apellido      = $request->apellido;
        $usuario->email         = $request->email;
        $usuario->oficina()->associate($oficina);

        $usuario->save();

        flash('El usuario'.$usuario->apellido.', '.$usuario->name.' se ha modificado de forma correcta!','warning');

        return redirect()->route('usuario.listar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $usuario = User::find($id);

        $usuario->delete();

        flash('El usuario '.$usuario->apellido.', '.$usuario->name.' se ha eliminado de forma correcta!','danger');

        return redirect()->route('usuario.listar');

    }
}
