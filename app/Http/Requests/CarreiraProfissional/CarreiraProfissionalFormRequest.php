<?php

namespace App\Http\Requests\CarreiraProfissional;

use Illuminate\Foundation\Http\FormRequest;

class CarreiraProfissionalFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_tipo_experiencia' => 'required|exists:tb_tipo_experiencia,id',
            'no_experiencia' => 'required|string|max:150',
            'no_empresa' => 'required|string|max:255', 
            'dt_inicio' => 'required|date',
            'dt_final' => 'nullable|date',
            'st_trabalho_atual' => 'required|numeric|between:0,1',
            'nr_total_horas' => 'nullable|numeric',
            'ds_url' => 'nullable|url',
            'ds_formacao' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'numeric' => 'O campo deve ser numérico',
            'string' => 'O campo não pode conter números',
            'date' => 'O campo eve ser uma data válida',
            'id_tipo_experiencia.exists' => 'Valor do ID não existe na tabela Tipo Experiência',
            'no_experiencia.max' => 'O campo deve ter no máximo 150 caracteres',
            'no_empresa.max' => 'O campo deve ter no máximo 255 caracteres',
            'st_trabalho_atual.between' => 'O valor deve está entre :min e :max',
            'ds_url.url' => 'O campo dever ser uma URL válida',
        ];
    }
}