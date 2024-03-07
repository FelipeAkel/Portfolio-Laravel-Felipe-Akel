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
            'no_login' => 'required',
            'ds_senha' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
        ];
    }
}
