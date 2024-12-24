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
            'no_login' => 'required|string',
            'ds_senha_antiga' => 'required|min:10|string',
            'ds_senha' => [
                'required',
                'string',
                'min:10',
                'regex:/[A-Z]/', // Deve conter pelo menos uma letra maiúscula
                'regex:/[a-z]/', // Deve conter pelo menos uma letra minúscula
                'regex:/[\W_]/', // Deve conter pelo menos um caractere especial
                'confirmed',
            ],
            'ds_senha_confirmation' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'string' => 'O campo deve ser uma string',
            'min' => 'O campo deve ter no mínimo 10 caracteres',
            'ds_senha.regex' => 'A nova senha deve ter letra maiúscula, minúscula e caractere especial.',
            'ds_senha.confirmed' => 'As novas senhas informadas são diferentes',
        ];
    }
}