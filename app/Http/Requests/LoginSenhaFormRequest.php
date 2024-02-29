<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginSenhaFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_login' => 'required',
            'ds_senha_antiga' => 'required | min:10',
            'ds_senha' => 'required | min:10 | confirmed',
            'ds_senha_confirmation' => 'required | min:10',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'min' => 'O campo deve ter no mínimo 10 caracteres',
            'ds_senha.confirmed' => 'As novas senhas informadas são diferentes',
        ];
    }
}

