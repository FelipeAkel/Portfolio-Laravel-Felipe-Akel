<?php

namespace App\Http\Requests;

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
            'id_tipo_experiencia' => 'required | exists:tb_tipo_experiencia,id',
            'no_experiencia' => 'required | string | max:255',
            'no_empresa' => 'required | string | max:255', 
            'dt_inicio' => 'required | date',
            'dt_final' => 'nullable | date',
            'nr_total_horas' => 'nullable | numeric',
            'ds_url' => 'nullable | url',
            'ds_formacao' => 'nullable | string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'numeric' => 'O campo deve ser numérico',
            'string' => 'O campo não pode conter números',
            'max' => 'O campo deve ter no máximo 255 caracteres',
            'date' => 'O campo eve ser uma data válida',
            'id_tipo_experiencia.exists' => 'Valor do ID não existe na tabela Tipo Experiência',
            'ds_url.url' => 'O campo dever ser uma URL válida',
        ];
    }
}
