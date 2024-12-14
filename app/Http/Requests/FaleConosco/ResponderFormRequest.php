<?php

namespace App\Http\Requests\FaleConosco;

use Illuminate\Foundation\Http\FormRequest;

class ResponderFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_status' => 'required|numeric|exists:tb_status,id', 
            'st_notificacao_email' => 'required|numeric|between:0,1', 
            'ds_resposta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório!',
            'numeric' => 'O campo deve ser numérico!',
            'id_status.exists' => 'Valor do ID não existe na tabela Status',
            'st_notificacao_email.between' => 'O valor deve está entre :min e :max',
        ];
    }
}