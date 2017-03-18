<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use App\Area;

class AreaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $areas = Area::orderBy('id','DESC')->paginate(10);

        return view('admin/areas/index_area',compact('areas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view('admin/areas/crear_area');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request){

        $area = Area::create($request->all());

        flash('Se ha creado la oficina "'.$area->nombre_area.'" de forma correcta!','success');

        return redirect()->route('area.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $area = Area::find($id);

        return view('admin/areas/editar_area')->with('area',$area);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $area = Area::find($id);

        $area->fill($request->all());

        $area->save();

        flash('El Area " '.$area->nombre_area.' " se ha modificado de forma correcta!','success');

        return redirect()->route('area.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    
        $area = Area::find($id);

        $area->delete();

        flash('El Area " '.$area->nombre_area.' " se ha eliminado de forma correcta!','danger');

        return redirect()->route('area.index');

    }
}
