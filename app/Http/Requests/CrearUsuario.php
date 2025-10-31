<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearUsuario extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'fname'       => 'required|max:20',
            'lname'       => 'required|max:20',
            'identificacion'       => 'string|max:13',
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'email'        => 'required|email:rfc,dns',


        ];
    }
}
