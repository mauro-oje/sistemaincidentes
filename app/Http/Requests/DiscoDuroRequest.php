<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DiscoDuroRequest extends Request
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
            'tipo_disco'      =>  'min:2|max:20|required',
            'marca_disco'     =>  'min:2|max:50|required',
            'modelo_disco'    =>  'min:2|max:50',
            'capacidad_disco' =>  'min:2|max:50|required',
            'interface'       =>  'min:2|max:20|required',
        ];
    }
}
