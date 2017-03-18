<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Incidente;
use App\Incidente_Usuario;
use App\Comentario;
use Auth;

class ComentarioController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){

        if(Auth::user()->tipo == "miembro"){
            $usuario = Auth::user()->id;
            $incidente = Incidente::find($id);
            $incidente_id = $incidente->incidente_id;

            $comentarios_consulta = Comentario::where('incidente_id',$incidente->id)->get();

            return view('admin/comentarios/crear_comentario',compact('incidente','comentarios_consulta'));
        }else{
            $incidente     = Incidente::find($id);
            $incidenteid = $incidente->incidente_id;

            $comentarios_consulta = Comentario::join('incidentes as i', 'i.id', '=', 'comentarios.incidente_id')
            ->select('comentarios.*')
            ->where('i.tipo_incidente',$incidente->tipo_incidente)
            ->where('comentarios.incidente_id',$incidente->id)
            ->get();
            //dd($comentarios_consulta);
            return view('admin/comentarios/crear_comentario',compact('incidente','comentarios_consulta'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //dd($request->all());

        $coment = new Comentario();
        //dd($coment);
        $consultas = DB::table('incidentes')->get();
        //dd($consultas);
        if(Auth::user()->tipo_incidente == 'miembro'){
            foreach($consultas as $consulta){
                if($consulta->user_id == Auth::user()->id and $consulta->id == $request->incidente_id){
                    //dd($consulta);
                    $coment->comentario = $request->comentario;
                    $coment->user_id = Auth::user()->id;
                    $coment->incidente_id = $consulta->id;
                    //dd($coment);
                    $coment->save();
                    //dd($coment);
                    if(Auth::user()->tipo == "miembro"){
                        return redirect()->route('comentario.crear',$consulta->id);
                    }else{
                        return redirect()->route('comentario.crear',$consulta->id);
                    }
                    
                }
                else{
                    "no hay un choten";
                }
            }
        }else{
            foreach($consultas as $consulta){
                if($consulta->id == $request->incidente_id){
                    //dd($consulta);
                    $coment->comentario = $request->comentario;
                    $coment->user_id = Auth::user()->id;
                    $coment->incidente_id = $consulta->id;
                    //dd($coment);
                    $coment->save();
                    //dd($coment);
                    if(Auth::user()->tipo == "miembro"){
                        return redirect()->route('comentario.crear',$consulta->id);
                    }else{
                        return redirect()->route('comentario.crear',$consulta->id);
                    }
                    
                }
                else{
                    "no hay un choten";
                }
            }
        }
    }

    public function cerrarIncidente($id){

        $incidente = Incidente::find($id);
        $incidente->estado = 'cerrado';
        $incidente->save();

        if(Auth::user()->tipo == "miembro"){
            return redirect()->route('incidente.listado.miembros');
        }else{
            return redirect()->route('incidente.listado.tecnico');
        }
        
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
