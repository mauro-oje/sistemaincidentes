<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PlacaMadreRequest;
use App\Http\Controllers\Controller;
use App\Area;
use App\PlacaMadre;

class PlacaMadreController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $placas_madres = PlacaMadre::buscar(request()->marca_placa)->orderBy('id','DES')->paginate(10);
        return view('admin/hardwares/placaMadre/index_PlacaMadre',compact('placas_madres'));
    }

    public function indexHS(Request $request){
        //$placas_madres = PlacaMadre::orderBy('id','DES')->paginate(10);
        $placas_madres = PlacaMadre::buscar(request()->marca_placa)->orderBy('id','DES')->paginate(10);
        return view('tecnicoHS/hardwares/placaMadre/index_PlacaMadre',compact('placas_madres'));
    }
    public function indexRI(Request $request){
        $placas_madres = PlacaMadre::buscar(request()->marca_placa)->orderBy('id','DES')->paginate(10);
        return view('tecnicoRI/hardwares/placaMadre/index_PlacaMadre',compact('placas_madres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view('admin/hardwares/placaMadre/crear_PlacaMadre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlacaMadreRequest $request){

        $placa = PlacaMadre::create($request->all());
        
        flash('La Motherboard " '.$placa->marca_placa.' - '.$placa->modelo_placa.' " se ha registrado correctamente!','success');

        return redirect()->route('placa.madre.index');
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

    public function editar($id){

        $placa_madre = PlacaMadre::find($id);

        return view('admin/hardwares/placaMadre/editar_PlacaMadre',compact('placa_madre'));
    }

    public function editarModal($id){

        $placa_madre = PlacaMadre::find($id);

        return view('admin/hardwares/placaMadre/editar_modal_placaMadre',compact('placa_madre'));
    }

    public function borrarModal($id){

        $placa_madre = PlacaMadre::find($id);

        return view('admin/hardwares/placaMadre/borrar_modal_placaMadre',compact('placa_madre'));
    }

    public function crearModal(){
        return view('admin/hardwares/placaMadre/registrar_modal_PlacaMadre');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlacaMadreRequest $request, $id){
        
        $placa = PlacaMadre::find($id);

        $placa->fill($request->all());

        $placa->save();

        flash('La Placa madre " '.$placa->marca_placa.' - '.$placa->modelo_placa.' " ha sido modificado correctamente!','warning');

        return redirect()->route('placa.madre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $placa = PlacaMadre::find($id);

        $placa->delete();

        flash('La Motherboard " '.$placa->marca_placa.' - '.$placa->modelo_placa.' "ha sido eliminado correctamente!','danger');

        return redirect()->route('placa.madre.index');
    }

}
