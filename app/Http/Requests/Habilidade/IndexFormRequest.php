<?php

namespace App\Http\Requests\Habilidade;

use Illuminate\Foundation\Http\FormRequest;

class IndexFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_tipo_habilidade' => 'nullable|exists:tb_tipo_habilidade,id',
            'nr_porcentagem' => 'nullable|numeric|between:0,100',
            'dt_created_inicio' => 'nullable|date',
            'dt_created_final' => 'nullable|date|after:dt_created_inicio',
        ];
    }

    public function messages()
    {
        return [
            'nullable' => 'O campo é opcional',
            'numeric' => 'O campo deve ser numérico',
            'date' => 'O campo deve ser uma data',
            'id_tipo_habilidade.exists' => 'Valor do ID não existe na tabela Tipo Habilidade',
            'nr_porcentagem.between' => 'O valor deve está entre :min e :max',
            'dt_created_final.after' => 'A data final deve ser maior que a data inicial',
        ];
    }
}