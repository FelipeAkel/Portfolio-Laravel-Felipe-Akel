<?php

namespace App\Http\Requests;

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
            'tipo_php_laravel' => 'nullable | min:11 | max:11',
            'tipo_website' => 'nullable | min:7 | max:7',
            'tipo_landing_page' => 'nullable | min:12 | max:12',
            'no_projeto' => 'required | max:70',
            'no_cliente' => 'nullable | max:70',
            'dt_inicio' => 'nullable | date',
            'dt_finalizacao' => 'nullable | date',
            'ds_url_projeto' => 'nullable | url',
            'ds_url_repositorio' => 'nullable | url',
            'ds_projeto' => 'required ',
            'ds_tecnologia' => 'required | max:100',
            'file_img_destaque' => 'required | file | mimes:png,jpg,jpeg',
            'file_img_1_galeria' => 'nullable | file | mimes:png,jpg,jpeg',
            'file_img_2_galeria' => 'nullable | file | mimes:png,jpg,jpeg',
            'file_img_3_galeria' => 'nullable | file | mimes:png,jpg,jpeg',
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
            'tipo_php_laravel.min' => 'Não alterar o valor: php-laravel',
            'tipo_php_laravel.max' => 'Não alterar o valor: php-laravel',
            'tipo_website.min' => 'Não alterar o valor: website',
            'tipo_website.max' => 'Não alterar o valor: website',
            'tipo_landing_page.min' => 'Não alterar o valor: landing-page',
            'tipo_landing_page.max' => 'Não alterar o valor: landing-page',
            'no_projeto.max' => 'O campo deve ter no máximo 70 caracteres',
            'no_cliente.max' => 'O campo deve ter no máximo 70 caracteres',
            'ds_tecnologia.max' => 'O campo deve ter no máximo 100 caracteres',
        ];
    }
}
