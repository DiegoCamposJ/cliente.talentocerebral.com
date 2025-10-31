<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarRespuestaSituacion extends FormRequest
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
            'respuesta'            => 'required|max:30',
        ];
    }

    public function messages()
    {
        return [
            'respuesta.required' => 'Debe seleccionar una respuesta',

        ];
    }
}
