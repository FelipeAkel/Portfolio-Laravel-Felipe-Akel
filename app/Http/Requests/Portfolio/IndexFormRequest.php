<?php

namespace App\Http\Requests\Portfolio;

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
            'tipo_php_laravel' => 'nullable|regex:/^php-laravel$/',
            'tipo_website' => 'nullable|regex:/^website$/',
            'tipo_landing_page' => 'nullable|regex:/^landing-page$/',
            'tipo_angular' => 'nullable|regex:/^angular$/',
            'no_projeto' => 'nullable|max:70',
            'ds_tecnologia' => 'nullable|max:100',
            'dt_inicio_inicio' => 'nullable|date',
            'dt_inicio_final' => 'nullable|date|after:dt_inicio_inicio',
            'dt_finalizacao_inicio' => 'nullable|date',
            'dt_finalizacao_final' => 'nullable|date|after:dt_finalizacao_inicio',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'date' => 'O campo deve ser uma data',
            'tipo_php_laravel.regex' => 'O campo deve conter exatamente a palavra: php-laravel',
            'tipo_website.regex' => 'O campo deve conter exatamente a palavra: website',
            'tipo_landing_page.regex' => 'O campo deve conter exatamente a palavra: landing-page',
            'tipo_angular.regex' => 'O campo deve conter exatamente a palavra: angular',
            'no_projeto.max' => 'O campo deve ter no máximo 70 caracteres',
            'ds_tecnologia.max' => 'O campo deve ter no máximo 100 caracteres',
            'dt_inicio_final.after' => 'A data deve ser maior que a Data Início',
            'dt_finalizacao_final.after' => 'A data deve ser maior que a Data Início',
        ];
    }
}