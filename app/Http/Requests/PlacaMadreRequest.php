<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlacaMadreRequest extends Request
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
            'marca_placa'  =>  'min:2|max:50|required',
            'modelo_placa'  =>  'min:2|max:50',
            'version'  =>  'min:2|max:20',
        ];
    }
}
