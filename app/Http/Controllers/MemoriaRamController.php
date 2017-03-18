<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MemoriaRamRequest;
use App\Http\Controllers\Controller;
use App\MemoriaRam;

class MemoriaRamController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $memorias = MemoriaRam::buscar(request()->marca_memoria)->orderBy('id','DES')->paginate(10);
        return view('admin/hardwares/memoriaRam/index_memoria_ram',compact('memorias'));

    }
    public function indexHS(Request $request){
        $memorias = MemoriaRam::buscar(request()->marca_memoria)->orderBy('id','DES')->paginate(10);
        return view('tecnicoHS/hardwares/memoriaRam/index_memoria_ram',compact('memorias'));
    }
    public function indexRI(Request $request){
        $memorias = MemoriaRam::buscar(request()->marca_memoria)->orderBy('id','DES')->paginate(10);
        return view('tecnicoRI/hardwares/memoriaRam/index_memoria_ram',compact('memorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view('admin/hardwares/memoriaRam/crear_memoria_ram');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemoriaRamRequest $request){
        
        $memoria = MemoriaRam::create($request->all());

        flash('La memoria " '.$memoria->marca_memoria.' - '.$memoria->tipo_memoria.' " ha sido registrada de forma satisfactoria!','success');

        return redirect()->route('memoria.ram.index');
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
         
         $memoria = MemoriaRam::find($id);

         return view('admin/hardwares/memoriaRam/editar_memoria_ram',compact('memoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $memoria = MemoriaRam::find($id);

        $memoria->fill($request->all());

        $memoria->save();

        flash('La memoria " '.$memoria->marca_memoria.' - '.$memoria->tipo_memoria.' " ha sido modificada de forma satisfactoria!','warning');

        return redirect()->route('memoria.ram.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $memoria = MemoriaRam::find($id);

        $memoria->delete();

        flash('La memoria " '.$memoria->marca_memoria.' - '.$memoria->tipo_memoria.' " ha sido eliminada de forma satisfactoria!','danger');

        return redirect()->route('memoria.ram.index');
    }
}
