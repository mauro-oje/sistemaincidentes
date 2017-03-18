<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Usuario;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

/*
    protected function validator(array $data){
        return Validator::make($data, [
            'cuenta' => 'required|cuenta|max:255|unique:usuarios',
            //'nombre' => 'required|max:255',
            'password' => 'required|confirmed|min:2',
        ]);

        flash($data->cuenta.'Ya te logeaste');

        redirect()->route('usuario.index');
    }
*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

/*
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
*/

    protected function create(array $data){

        $user = new User([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->tipo = 'admin';
        $user->save();

        return $user;
    }

    protected function getLogin(){
        return view('admin/autenticacion/login');
    }

/*
    protected function create(array $data){
        return Usuario::create([
            'cuenta' => $data['cuenta'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipo_usuario_id' => $data['tipo_usuario_id'],
            'oficina_id' => $data['oficina_id'],
        ]);
    }
*/

    /*
    protected function getLogin(){

        return view('admin/autentcacion/login');

    }
    */

    //protected $redirectPath = '/admin/usuario/todos-los-usuarios';
    protected $redirectPath = '/';

    protected $loginPath = 'admin/autenticacion/login';

    //Para redirigir a una ruta diferente una vez
    //autenticado el usuario.
    //protected $redirectPath = '/admin/usuarios';

    //La ruta con el cual el usuario se va a identificar.
    //Yo le asigne a "Iniciar sesión".
    //protected $loginPath = 'admin/autenticacion/login';

}
