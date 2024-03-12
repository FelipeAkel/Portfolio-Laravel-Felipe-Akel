<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicosFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_servico' => 'required | max:100',
            'ds_servico' => 'required | max:600',
            'file_icon_svg' => 'required | file | mimes:svg',    // image    file|size:512   dimensions:min_width=100,min_height=200
            'file_img' => 'nullable | file | mimes:png,jpg,jpeg',         // image    file|size:512   dimensions:min_width=100,min_height=200
        ];
    }
    

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'file' => 'Deve-se enviar um arquivo',
            'no_servico.max' => 'O campo deve ter no máximo 100 caracteres',
            'ds_servico.max' => 'O campo deve ter no máximo 600 caracteres',
            'file_icon_svg.mimes' => 'O arquivo deve ter extensão: svg',
            'file_img.mimes' => 'O arquivo deve ter extensão: png, jpg ou jpeg',
        ];
    }
}
