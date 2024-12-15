<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArquivosFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ds_url_curriculo' => 'nullable|file|mimes:pdf',
            'ds_url_foto_usuario' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'nullable' => 'O campo é opcional',
            'file' => 'Deve-se enviar um arquivo',
            'ds_url_curriculo.mimes' => 'O arquivo deve ter extensão: pdf',
            'ds_url_foto_usuario.mimes' => 'O arquivo deve ter extensão: png, jpg ou jpeg',
        ];
    }
}