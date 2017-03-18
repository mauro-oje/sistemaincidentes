<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FuenteRequest extends Request
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
            'marca_fuente'     =>  'min:2|max:50|required',
            'modelo_fuente'    =>  'min:2|max:50',
            'capacidad_fuente' =>  'min:2|max:10|required',
        ];
    }
}
