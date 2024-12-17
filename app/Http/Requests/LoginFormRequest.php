<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_login' => 'required|string',
            'ds_senha' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'string' => 'O campo deve ser uma string',
            'ds_senha.min' => 'A senha deve ter no mínimo :min caracteres',
        ];
    }
}