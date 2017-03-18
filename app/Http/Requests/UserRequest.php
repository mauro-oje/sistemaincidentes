<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'username' =>  'min:3|max:30|required|unique:users',
            'name'     =>  'min:3|max:60|required',
            'apellido' =>  'min:3|max:30|required',
            'email'    =>  'min:3|max:250|required|unique:users',
            'password' =>  'min:2|max:60|required',
            'tipo'     =>  'required'
        ];
    }
}
