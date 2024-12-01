<?php

namespace App\Http\Requests\CarreiraProfissional;

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
            'id_tipo_experiencia' => 'nullable|exists:tb_tipo_experiencia,id',
            'no_experiencia' => 'nullable|string|max:150',
            'dt_inicio' => 'nullable|date',
            'dt_final' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'date' => 'O campo deve ser uma data',
            'id_tipo_experiencia.exists' => 'Valor do ID não existe na tabela Tipo Habilidade',
            'no_experiencia.string' => 'O campo deve ser uma string',
            'no_experiencia.max' => 'O campo deve ter no máximo 150 caracteres',
        ];
    }
}