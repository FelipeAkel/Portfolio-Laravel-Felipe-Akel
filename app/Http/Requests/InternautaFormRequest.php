<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternautaFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "no_contato" => 'required | max:70',
            "ds_email" => 'required | email | max:70',
            "ds_assunto" => 'required | max:70',
            "ds_mensagem" => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'no_contato.max' => 'O campo Nome é limitado a 70 caracteres',
            'ds_email.email' => 'O E-mail deve ser válido',
            'ds_email.max' => 'O campo E-mail é limitado a 70 caracteres',
            'ds_assunto.max' => 'O campo Assunto é limitado a 70 caracteres',
        ];

    }
}
