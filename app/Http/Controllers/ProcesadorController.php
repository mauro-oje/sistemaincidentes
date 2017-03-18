<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProcesadorRequest;
use App\Http\Controllers\Controller;
use App\Procesador;

class ProcesadorController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        //$procesadores = Procesador::orderBy('id','DESC')->paginate(10);
        $procesadores = Procesador::buscar(request()->modelo_procesador)->orderBy('id','DESC')->paginate(10);
        return view('admin/hardwares/procesador/index_procesador',compact('procesadores'));
        
    }

    public function indexHS(Request $request){
        $procesadores = Procesador::buscar(request()->modelo_procesador)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoHS/hardwares/procesador/index_procesador',compact('procesadores'));
    }

    public function indexRI(Request $request){
        $procesadores = Procesador::buscar(request()->modelo_procesador)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoRI/hardwares/procesador/index_procesador',compact('procesadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin/hardwares/procesador/crear_procesador');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcesadorRequest $request){

        $procesador = Procesador::create($request->all());

        flash('El procesador "'.$procesador->marca_procesador.' - '.$procesador->modelo_procesador.'" ha sido creado satisfactoriamente','success');

        return redirect()->route('procesador.index',compact('procesador'));
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
        
        $procesador = Procesador::find($id);

        return view('admin/hardwares/procesador/editar_procesador',compact('procesador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $procesador = Procesador::find($id);

        $procesador->fill($request->all());

        $procesador->save();

        flash('El procesador " '.$procesador->marca_procesador.' - '.$procesador->modelo_procesador.' " ha sido modificado satisfactoriamente','warning');

        return redirect()->route('procesador.index',compact('procesador'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $procesador = Procesador::find($id);

        $procesador->delete();

        flash('El Procesador " '.$procesador->marca_procesador.' - '.$procesador->modelo_procesador.' "ha sido eliminado correctamente!','danger');

        return redirect()->route('procesador.index');
        
    }

    public function procElegir($id){
        if($id == 1){
            $proc =  array('AM2'=>'AM2','AMD2+'=>'AMD2+');
        }else{
            $proc =  array('LGA 2011'=>'LGA 2011','LGA 1150'=>'LGA 1150' );
        }
        return Response::json($proc);
    }
}
