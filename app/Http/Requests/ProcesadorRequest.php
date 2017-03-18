<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProcesadorRequest extends Request
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
            'marca_procesador'     =>  'min:2|max:50|required',
            'modelo_procesador'    =>  'min:2|max:50',
            'capacidad_procesador' =>  'min:2|max:20',
            'core_procesador'      =>  'min:1|max:2',
            'socket_procesador'    =>  'min:2|max:20'
        ];
    }
}
