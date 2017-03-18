<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FuenteRequest;
use App\Http\Controllers\Controller;
use App\Fuente;

class FuenteController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $fuentes = Fuente::buscar(request()->marca_fuente)->orderBy('id','DESC')->paginate(10);
        return view('admin/hardwares/fuente/index_fuente',compact('fuentes'));

    }
    public function indexHS(Request $request){ 
        $fuentes = Fuente::buscar(request()->marca_fuente)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoHS/hardwares/fuente/index_fuente',compact('fuentes'));
    }
    public function indexRI(Request $request){  
        $fuentes = Fuente::buscar(request()->marca_fuente)->orderBy('id','DESC')->paginate(10);
        return view('tecnicoRI/hardwares/fuente/index_fuente',compact('fuentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view('admin/hardwares/fuente/crear_fuente');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuenteRequest $request){
        
        $fuente = Fuente::create($request->all());

        flash('La fuente " '.$fuente->marca_fuente.' '.$fuente->modelo_fuente.' de '.$fuente->capacidad_fuente.' " ha sido creada de manera correcta!','success');

        return redirect()->route('fuente.index');
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
        
        $fuente = Fuente::find($id);

        return view('admin/hardwares/fuente/editar_fuente',compact('fuente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $fuente = Fuente::find($id);
        $fuente->fill($request->all());
        $fuente->save();

        flash('La fuente " '.$fuente->marca_fuente.' '.$fuente->modelo_fuente.' de '.$fuente->capacidad_fuente.' " ha sido modificada de manera correcta!','warning');

        return redirect()->route('fuente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $fuente = Fuente::find($id);
        $fuente->delete();

        flash('La fuente " '.$fuente->marca_fuente.' '.$fuente->modelo_fuente.' de '.$fuente->capacidad_fuente.' " ha sido eliminada de manera correcta!','danger');

        return redirect()->route('fuente.index');

    }
}
