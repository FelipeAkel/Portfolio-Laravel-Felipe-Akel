<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// SobreMim - Controller
class InformacaoPessoalFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_usuario' => 'required | max:70', 
            'no_usuario_portfolio' => 'required | max:70', 
            'ds_email' => 'required | max:70 | email', 
            'ds_telefone' => 'required | max:15', 
            'ds_cidade_uf' => 'required | max:70', 
            'ds_funcao' => 'required | max:70', 
            'ds_subtitulo' => 'required | max:70', 
            'ds_perfil' => 'required', 
            'ds_url_linkedin' => 'nullable | max:255 | url', 
            'ds_url_github' => 'nullable | max:255 | url', 
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'max' => 'O campo deve ter no máximo 70 caracteres',
            'url' => 'O campo deve ser uma URL válida',
            'ds_email.email' => 'O campo deve ser um e-mail válido',
            'ds_telefone.max' => 'O campo deve ter no máximo 15 caracteres',
            'ds_url_linkedin.max' => 'O campo deve ter no máximo 255 caracteres',
            'ds_url_github.max' => 'O campo deve ter no máximo 255 caracteres',
        ];
    }
}
