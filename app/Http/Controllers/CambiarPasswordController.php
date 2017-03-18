<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;

class CambiarPasswordController extends Controller
{
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
    public function create(){
        return view('auth/cambiar_password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function cambiarPassword(Request $request){

        $rules = array(
            'password'         => 'required',
            'password_nuevo'   => 'required|min:5',
            'repetir_password' => 'required|same:password_nuevo'
        );
        $messages = array(
                'required' => 'El campo :attribute es obligatorio.',
                'min'      => 'El campo :attribute no puede tener menos de :min carácteres.'
        );
       
        $validation = Validator::make($request->all(),$rules,$messages);

        if($validation->fails()){
            flash('Upp! tenemos problem hiuuuustooonnn','warning');
            return Redirect::to('/usuario/cambiar-contraseña')->withErrors($validation)->withInput();
        }else{
            if(Hash::check($request->password,Auth::user()->password)){
                $usuario = new User();
                $usuario = Auth::user();
                $usuario->password = Hash::make($request->password_nuevo);
                $usuario->save();

                if($usuario->save()){
                    //return Redirect::to('/')->with('notice', 'Nueva contraseña guardada de forma correcta!');
                    flash('Nueva contraseña guardada de forma correcta!','success');
                    return Redirect::to('/');
                }else{
                    //return Redirect::to('/')->with('notice', 'No se ha podido guardar la nueva contaseña!');
                    flash('No se ha podido guardar la nueva contaseña!','danger');
                    return Redirect::to('usuario/cambiar-contraseña');
                }
            }else{
                //return Redirect::to('/')->with('notice', 'La contraseña actual no es correcta')->withInput();
                flash('La contraseña actual no es correcta');
                //return Redirect::to('cambiar-contraseña-error')->with('notice', 'La contraseña actual no es correcta')->withInput();
                return redirect()->route('errorPassword');
            }
        }

    }

    public function errorPassword(){
        return view('auth/error_password');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth/cambiar_password');
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
