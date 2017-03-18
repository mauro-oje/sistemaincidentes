<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\EquipoRequest;
use App\Http\Controllers\Controller;
use App\Equipo;
use App\User;
use App\PlacaMadre;
use App\MemoriaRam;
use App\DiscoDuro;
use App\Impresora;
use App\Ip;
use App\Fuente;
use App\Procesador;

class EquipoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $equipos = Equipo::buscar(request()->nombre_equipo)->orderBy('id','DESC')->paginate(3);
        /*
        $memorias = MemoriaRam::all();

        $memorias->each(function($memorias){
            $memorias->equipo;
        });
        //dd($memorias);
       */
        return view('admin/hardwares/equipo/index_equipo',compact('equipos'));
    }
    
    public function indexHS(Request $request){
        $equipos = Equipo::buscar(request()->nombre_equipo)->orderBy('id','DESC')->paginate(3);
        return view('tecnicoHS/hardwares/equipo/index_equipos',compact('equipos'));
    }
    public function indexRI(Request $request){
        $equipos = Equipo::buscar(request()->nombre_equipo)->orderBy('id','DESC')->paginate(3);
        return view('tecnicoRI/hardwares/equipo/index_equipos',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $usuarios     = User::all();
        $placas       = PlacaMadre::where('disponible','=',"si")->get();
        $memorias     = MemoriaRam::where('disponible','=',"si")->get();
        $discos       = DiscoDuro::where('disponible','=',"si")->get();
        $impresoras   = Impresora::where('disponible','=',"si")->get();
        $ips          = Ip::where('disponible','=',"si")->get();
        $fuentes      = Fuente::where('disponible','=',"si")->get();
        $procesadores = Procesador::where('disponible','=',"si")->get();

        return view('admin/hardwares/equipo/crear_equipo',
            compact('usuarios','placas','memorias','discos','impresoras','ips','fuentes','procesadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipoRequest $request){

        $placa_id      = PlacaMadre::find($request->id_placa);
        $memoria_id    = MemoriaRam::find($request->id_memoria);
        if($request->id_memoria2){
            $memoria_id2 = MemoriaRam::find($request->id_memoria2);
        }else{
            $id_memoria2 = null;
        }
        $procesador_id = Procesador::find($request->id_procesador);
        $disco_id      = DiscoDuro::find($request->id_disco);
        $ip_id         = Ip::find($request->id_ip);
        $impresora_id  = Impresora::find($request->id_impresora);
        $fuente_id     = Fuente::find($request->id_fuente);

        $equipo = Equipo::create($request->all());

        if($placa_id){
        $placa_id->equipo()->associate($equipo);
        $placa_id->disponible = "no";
        $placa_id->save();
        }
        if($procesador_id){
            $procesador_id->equipo()->associate($equipo);
            $procesador_id->disponible = "no";
            $procesador_id->save();
        }
        if($memoria_id){
            $memoria_id->equipo()->associate($equipo);
            $memoria_id->disponible = "no";
            $memoria_id->save();
        }
        if($memoria_id2){
            $memoria_id2->equipo()->associate($equipo);
            $memoria_id2->disponible = "no";
            $memoria_id2->save();
        }
        if($disco_id){
            $disco_id->equipo()->associate($equipo);
            $disco_id->disponible = "no";
            $disco_id->save();
        }
        if($ip_id){
            $ip_id->equipo()->associate($equipo);
            $ip_id->disponible = "no";
            $ip_id->save();
        }
        if($impresora_id){
            $impresora_id->equipo()->associate($equipo);
            $impresora_id->disponible = "no";
            $impresora_id->save();
        }

        if($fuente_id){
            $fuente_id->equipo()->associate($equipo);
            $fuente_id->disponible = "no";
            $fuente_id->save();
            $equipo->usuario;
        }

        return redirect()->route('equipo.index');
    }

    public function cargarMemoria(Request $request){

        $memoria_seleccionada = $request->id_memoria;

        $memorias_disponibles = db::table('memorias_ram')
            ->where('disponible','=','si')
            ->where('id','<>',$memoria_seleccionada)
            ->get();

        return view('admin/hardwares/equipo/cargar_memoria',compact('memorias_disponibles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }
    /*
    public function getEquipo($id){
        $equipo = Equipo::find($id);
        $usuario = User::find($equipo->user_id);
        return view('admin/usuarios/equipo',compact('equipo','usuario'));
    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $usuarios     = User::all();
        $placas       = PlacaMadre::where('disponible','=',"si")->get();
        $memorias     = MemoriaRam::where('disponible','=',"si")->get();
        $discos       = DiscoDuro::where('disponible','=',"si")->get();
        $impresoras   = Impresora::where('disponible','=',"si")->get();
        $ips          = Ip::where('disponible','=',"si")->get();
        $fuentes      = Fuente::where('disponible','=',"si")->get();
        $procesadores = Procesador::where('disponible','=',"si")->get();

        $equipo       = Equipo::find($id);
        $equipo->placaMadre;
        $equipo->fuente;
        
        $consulta_memoria   = db::select('select * FROM memorias_ram where equipo_id ='.$equipo->id);
        $consulta_disco     = db::selectOne('select * FROM discos_duros where equipo_id ='.$equipo->id);
        $consulta_ip        = db::selectOne('select * FROM ips where equipo_id ='.$equipo->id);
        $consulta_impresora = db::selectOne('select * FROM impresoras where equipo_id ='.$equipo->id);

        return view('admin/hardwares/equipo/editar_equipo',
            compact('equipo','consulta_memoria','consulta_disco','consulta_ip','consulta_impresora',
                'usuarios','placas','fuentes','memorias','discos','ips','fuentes','impresoras','procesadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $equipo = Equipo::find($id);

        $equipo->tipo          = $request->tipo;
        $equipo->nombre_equipo = $request->nombre_equipo;
        $equipo->so            = $request->so;
        $equipo->descripcion   = $request->descripcion;
        if($equipo->user_id != $request->user_id){
            $usuario = User::find($request->user_id);
            $equipo->user()->associate($usuario);
            $equipo->save();
        }
        $c_memoria = db::table('memorias_ram')->where('equipo_id','=',$id)->get();
        if($c_memoria[0]){
            if($c_memoria[0]->id != $request->id_memoria){
                $memoria_anterior = MemoriaRam::find($c_memoria[0]->id);
                $memoria_anterior->disponible = "si";
                $memoria_anterior->equipo_id = null;
                $memoria_anterior->save();

                $c_memoria = MemoriaRam::find($request->id_memoria);
                $c_memoria->disponible = "no";
                $c_memoria->equipo_id = $equipo->id;
                $c_memoria->save();
            }
        }
        if(empty($c_memoria[1])){
            if($request->id_memoria2 != "null"){
                $c_memoria = MemoriaRam::find($request->id_memoria2);
                $c_memoria->disponible = "no";
                $c_memoria->equipo_id = $equipo->id;
                $c_memoria->save();
            }
        }else{
            if($request->id_memoria2 == "null"){
                $memoria_anterior = MemoriaRam::find($c_memoria[1]->id);
                $memoria_anterior->disponible = "si";
                $memoria_anterior->equipo_id = null;
                $memoria_anterior->save();
            }elseif($c_memoria[1]->id != $request->id_memoria2){
                $memoria_anterior = MemoriaRam::find($c_memoria[1]->id);
                $memoria_anterior->disponible = "si";
                $memoria_anterior->equipo_id = null;
                $memoria_anterior->save();

                $c_memoria = MemoriaRam::find($request->id_memoria2);
                $c_memoria->disponible = "no";
                $c_memoria->equipo_id = $equipo->id;
                $c_memoria->save();
            }
        }

        $equipo->editarPlaca($equipo->id,$request->id_placa);
        $equipo->editarProcesador($equipo->id,$request->id_procesador);
        $equipo->editarDisco($equipo->id,$request->id_disco);
        $equipo->editarImpresora($equipo->id,$request->id_impresora);
        $equipo->editarIp($equipo->id,$request->id_ip);
        $equipo->editarFuente($equipo->id,$request->id_fuente);

        $equipo->save();

        flash('El equipo "'.$equipo->nombre_equipo.' " se ha modificado de forma correcta!','warning');

        return redirect()->route('equipo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $equipo = Equipo::find($id);

        $equipo->eliminarPlaca($equipo->id);
        $equipo->eliminarProcesador($equipo->id);
        $equipo->eliminarMemoria($equipo->id);
        $equipo->eliminarDisco($equipo->id);
        $equipo->eliminarImpresora($equipo->id);
        $equipo->eliminarIp($equipo->id);
        $equipo->eliminarFuente($equipo->id);

        $equipo->delete();

        flash('El equipo "'.$equipo->nombre_equipo.' " se ha eliminado de forma correcta!','danger');

        return redirect()->route('equipo.index');
    }
}
