<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearEmpresa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->can('crear-empresa'))
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ruc'               => 'required|unique:empresas|min:13|max:13',
            'nombre'            => 'required|max:100',
            'ciudad'            => 'required|max:30',
            'representante'     => 'required|max:100',
            'telefono'          => 'required|max:15',

        ];
    }

    public function messages()
    {
        return [
            'ruc.required' => 'Ingrese el RUC de la Empresa',
            'nombre.required'  => 'Ingrese el Nombre de la Empresa',
        ];
    }


}
