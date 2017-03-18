<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller{

        /*
    |--------------------------------------------------------------------------
    | Controlador de la autenticación de usuarios
    |--------------------------------------------------------------------------
    */

    /**
     * Muestra el formulario para login.
     */
    public function getLogin(){

        // Verificamos que el usuario no esté autenticado
        if (Auth::check()){

            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            //return Redirect::to('inicio');
            return view('inicio');
        }

        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('admin/autenticacion/login');
    }

    /**
     * Valida los datos del usuario.
     */
    public function postLogin(){

        // Guardamos en un arreglo los datos del usuario.
        $userdata = array(
            'username' => Input::get('username'),
            'password'=> Input::get('password')
        );

        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        //if(Auth::attempt($userdata, Input::get('remember-me', 0))){
        if(Auth::attempt($userdata)){

            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('/');
        }

        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('inicio-de-sesion')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
    }

    /**
     * Muestra el formulario de login mostrando un mensaje de que cerró sesión.
     */
    public function logOut(){

        Auth::logout();
        return Redirect::to('inicio-de-sesion')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }


/*
    public function handle($request, Closure $next){
        if ($this->auth->guest()){
            if ($request->ajax()){
                return response('Unauthorized.', 401);
            }else {
                //return redirect()->guest('auth/login')
                return redirect()->guest('admin/autenticacion/login');
            }
        }

        return $next($request);
    }
*/
    protected $redirectPath = '/admin/usuario/todos-los-usuarios';

    protected $loginPath = 'admin/autenticacion/login';

}
