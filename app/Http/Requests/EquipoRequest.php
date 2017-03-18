<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EquipoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo'          =>  'required|min:2|max:20',
            'nombre_equipo' =>  'required|min:2|max:20|unique:equipos',
            'so'            =>  'required|min:2|max:75',
            'user_id'       =>  'required'
        ];
    }
}
