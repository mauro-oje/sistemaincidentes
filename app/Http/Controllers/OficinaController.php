<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\OficinaRequest;
use App\Http\Controllers\Controller;
use App\Oficina;
use App\Area;

class OficinaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $oficinas = Oficina::orderBy('id','DES')->paginate(10);
        return view('admin/oficinas/index_oficina',compact('oficinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $areas = Area::all();

        return view('admin/oficinas/crear_oficina',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OficinaRequest $request){

        $area = Area::find($request->area_id);

        $oficina = new Oficina();

        $oficina->oficina = $request->oficina;
        $oficina->area_id = $request->area_id;

        $oficina->area()->associate($area);

        $oficina->save();

        flash('La oficina "'.$oficina->oficina.'" se ha creado de forma correcta!','success');

        return redirect()->route('oficina.index');

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
        
        $oficina = Oficina::find($id);

        $areas = Area::all();

        return view('admin/oficinas/editar_oficina',compact('oficina','areas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $oficina = Oficina::find($id);

        $area = Area::find($request->area_id);

        $oficina->oficina = $request->oficina;

        $oficina->area()->associate($area);

        $oficina->save();

        flash('Se ha modificado la oficina "'.$oficina->oficina.'" de forma correcta!','warning');

        return redirect()->route('oficina.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $oficina = Oficina::find($id);

        $oficina->delete();

        flash('Se ha eliminado la oficina "'.$oficina->oficina.'" de forma correcta!','danger');

        return redirect()->route('oficina.index');

    }
}
