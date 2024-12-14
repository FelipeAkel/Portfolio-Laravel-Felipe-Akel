<?php

namespace App\Http\Requests\FaleConosco;

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
            'id_status' => 'nullable|numeric|exists:tb_status,id',
            'dt_created_inicio' => 'nullable|date|',
            'dt_created_final' => 'nullable|date|after:dt_created_inicio',
        ];
    }

    public function messages()
    {
        return [
            'nullable' => 'O campo é opcional',
            'numeric' => 'O campo deve ser numérico',
            'date' => 'O campo deve ser uma data',
            'id_status.exists' => 'Valor do ID não existe na tabela Status',
            'dt_created_final.after' => 'A data final deve ser maior que a data inicial'
        ];
    }
}