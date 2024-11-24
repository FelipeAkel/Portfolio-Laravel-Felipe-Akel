<?php

namespace App\Http\Requests\Habilidade;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_tipo_habilidade' => 'required|exists:tb_tipo_habilidade,id', 
            'no_habilidade' => 'required|max:150', 
            'ds_habilidade' => 'nullable|max:150', 
            'nr_porcentagem' => 'required|numeric|between:0,100', 
            'nr_ordenacao' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'max' => 'O campo deve ter no máximo 150 caracteres',
            'numeric' => 'O campo deve ser numérico',
            'id_tipo_habilidade.exists' => 'Valor do ID não existe na tabela Tipo Habilidade',
            'nr_porcentagem.between' => 'O valor deve está entre :min e :max',
        ];
    }
}