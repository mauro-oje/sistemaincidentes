<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DiscoDuroRequest;
use App\Http\Controllers\Controller;
use App\DiscoDuro;

class DiscoDuroController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $discos = DiscoDuro::buscar(request()->marca_disco)->orderBy('id','DESC')->paginate(10);
        return view('admin/hardwares/discoDuro/index_disco_duro',compact('discos'));
        
    }
    public function indexHS(Request $request){
        $discos = DiscoDuro::buscar(request()->marca_disco)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoHS/hardwares/discoDuro/index_disco_duro',compact('discos'));
    
    }
    public function indexRI(Request $request){
        $discos = DiscoDuro::buscar(request()->marca_disco)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoRI/hardwares/discoDuro/index_disco_duro',compact('discos'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view('admin/hardwares/discoDuro/crear_disco_duro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscoDuroRequest $request){
        
        $disco = DiscoDuro::create($request->all());

        flash('El disco " '.$request->marca_disco.' '.$request->modelo_disco.' de '.$request->capacidad_disco.' " ha sido registrado de forma satisfactoria!','success');

        return redirect()->route('disco.duro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $disco = DiscoDuro::find($id);

        return view('admin/hardwares/discoDuro/editar_disco_duro')->with('disco',$disco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $disco = DiscoDuro::find($id);
        $disco->fill($request->all());
        $disco->save();

        flash('El disco " '.$disco->marca_disco.' '.$disco->modelo_disco.' de '.$disco->capacidad_disco.' " se ha modificado de forma correcta!','warning');

        return redirect()->route('disco.duro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $disco = DiscoDuro::find($id);
        $disco->delete();

        flash('El disco " '.$disco->marca_disco.' '.$disco->modelo_disco.' de '.$disco->capacidad_disco.' " se ha eliminado de forma correcta!','danger');

        return redirect()->route('disco.duro.index');
    }
}
