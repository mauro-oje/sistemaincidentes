<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ImpresoraRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Impresora;
use App\Ip;

class ImpresoraController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $impresoras = Impresora::buscar(request()->marca_impresora)->orderBy('id','DESC')->paginate(10);
        return view('admin/hardwares/impresora/index_impresora',compact('impresoras'));
    }

    public function indexHS(Request $request){
        $impresoras = Impresora::buscar(request()->marca_impresora)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoHS/hardwares/impresora/index_impresora',compact('impresoras'));
    }
    public function indexRI(Request $request){ 
        $impresoras = Impresora::buscar(request()->marca_impresora)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoRI/hardwares/impresora/index_impresora',compact('impresoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $ips = Ip::all();
        
        return view('admin/hardwares/impresora/crear_impresora',compact('ips'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImpresoraRequest $request){

        $ip_seleccionada = Ip::find($request->id_ip);

        $impresora = Impresora::create($request->all());
        if($ip_seleccionada){
            $ip_seleccionada->impresora()->associate($impresora);
            $ip_seleccionada->disponible = "no";
            $ip_seleccionada->save();
        }

        flash('La impresora " '.$impresora->marca_impresora.' '.$impresora->modelo_impresora.' " ha sido registrada de forma correcta!','success');

        return redirect()->route('impresora.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $impresora   = Impresora::find($id);
        $ips         = Ip::where('disponible','=',"si")->get();
        $consulta_ip = db::selectOne('select * FROM ips where impresora_id ='.$id);

        return view('admin/hardwares/impresora/editar_impresora',compact('impresora','ips','consulta_ip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //dd($request->all(),$id);
        $impresora = Impresora::find($id);

        $impresora->fill($request->all());

        $consulta_ip = db::selectOne('select * FROM ips where impresora_id ='.$id);

        if($consulta_ip){
            //dd($consulta_ip);
            if($request->id_ip != "null"){
                $ip_anterior = Ip::find($consulta_ip->id);
                $ip_anterior->disponible = "si";
                $ip_anterior->impresora_id = null;
                $ip_anterior->save();

                $ip = Ip::find($request->id_ip);
                $ip->disponible = "no";
                $ip->impresora_id = $id;
                $ip->save();
            }elseif($request->id_ip == "null"){
                $ip_anterior = Ip::find($consulta_ip->id);
                $ip_anterior->disponible = "si";
                $ip_anterior->impresora_id = null;
                $ip_anterior->save();
            }elseif($consulta_ip->id != $request->id_ip){
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
            //dd($consulta_ip);
            if($consulta_ip == "null"){
                //dd($consulta_ip);
                $ip = Ip::find($request->id_ip);
                $ip->disponible = "no";
                $ip->impresora_id = $id;
                $ip->save();
            }else{
                $ip = Ip::find($request->id_ip);
                $ip->disponible = "no";
                $ip->impresora_id = $id;
                $ip->save();
            }
        }
        $impresora->save();

        flash('La impresora " '.$impresora->marca_impresora.' '.$impresora->modelo_impresora.' " ha sido modificada de forma correcta!','warning');

        return redirect()->route('impresora.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $impresora = Impresora::find($id);
        $ip_seleccionada = Ip::where('impresora_id','=',$impresora->id)->get();

        foreach($ip_seleccionada as $ip){
            $ip->disponible = "si";
            $ip->impresora_id = null;
            $ip->save();
        }

        $impresora->delete();

        flash('La impresora " '.$impresora->marca_impresora.' '.$impresora->modelo_impresora.' " ha sido eliminada de forma correcta!','danger');

        return redirect()->route('impresora.index');

    }
}
