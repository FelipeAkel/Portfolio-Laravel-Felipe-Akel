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
            'ds_url_icon_svg' => 'required',    // image    file|size:512   dimensions:min_width=100,min_height=200
            'ds_url_img' => 'required',         // image    file|size:512   dimensions:min_width=100,min_height=200
        ];
    }
    

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            // 'image' => 'Somente arquivos (jpeg, png, bmp, gif, svg, ou webp)',
            'no_servico.max' => 'O campo deve ter no máximo 100 caracteres',
            'ds_servico.max' => 'O campo deve ter no máximo 600 caracteres',
        ];
    }
}
