<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MemoriaRamRequest extends Request
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
            'tipo_memoria'      =>  'required|min:2|max:20',
            'marca_memoria'     =>  'required|min:2|max:50',
            'capacidad_memoria' =>  'required|min:2|max:20',
        ];
    }
}
