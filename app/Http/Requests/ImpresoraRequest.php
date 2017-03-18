<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImpresoraRequest extends Request
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
            'marca_impresora'  =>  'min:2|max:20|required',
            'modelo_impresora' =>  'min:2|max:20',
            'tipo_impresora'   =>  'min:2|max:30',
            'direccion_ip'     =>  'min:2|max:20'
        ];
    }
}
