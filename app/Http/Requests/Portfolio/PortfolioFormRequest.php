<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioFormRequest extends FormRequest
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
            'no_projeto' => 'required|max:70',
            'no_cliente' => 'nullable|max:70',
            'dt_inicio' => 'nullable|date',
            'dt_finalizacao' => 'nullable|date|after:dt_inicio',
            'ds_url_projeto' => 'nullable|url',
            'ds_url_repositorio' => 'nullable|url',
            'ds_projeto' => 'required',
            'ds_tecnologia' => 'required|max:100',
            'file_img_destaque' => 'required|file|mimes:png,jpg,jpeg',
            'file_img_1_galeria' => 'nullable|file|mimes:png,jpg,jpeg',
            'file_img_2_galeria' => 'nullable|file|mimes:png,jpg,jpeg',
            'file_img_3_galeria' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'nullable' => 'O campo é opcional',
            'date' => 'O campo deve ser uma data',
            'url' => 'O campo deve ser uma URL válida',
            'file' => 'Deve-se enviar um arquivo',
            'mimes' => 'O arquivo deve ter extensão: png, jpg ou jpeg',
            'tipo_php_laravel.regex' => 'O campo deve conter exatamente a palavra: php-laravel',
            'tipo_website.regex' => 'O campo deve conter exatamente a palavra: website',
            'tipo_landing_page.regex' => 'O campo deve conter exatamente a palavra: landing-page',
            'tipo_angular.regex' => 'O campo deve conter exatamente a palavra: angular',
            'no_projeto.max' => 'O campo deve ter no máximo 70 caracteres',
            'no_cliente.max' => 'O campo deve ter no máximo 70 caracteres',
            'dt_finalizacao.after' => 'A data deve ser maior que a Data Início',
            'ds_tecnologia.max' => 'O campo deve ter no máximo 100 caracteres',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Verificar se pelo menos um checkbox está selecionado
            if (!$this->hasAnyChecked()) {
                $validator->errors()->add('tipo_projeto', 'Pelo menos um tipo de projeto deve ser selecionado');
            }
        });
    }

    protected function hasAnyChecked()
    {
        return $this->filled('tipo_php_laravel') || 
            $this->filled('tipo_website') || 
            $this->filled('tipo_landing_page') ||
            $this->filled('tipo_angular');
    }
}