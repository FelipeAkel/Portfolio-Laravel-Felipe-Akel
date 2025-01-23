<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArquivosFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ds_url_curriculo' => 'nullable|file|mimes:pdf',
            'ds_url_foto_usuario' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'nullable' => 'O campo é opcional',
            'file' => 'Deve-se enviar um arquivo',
            'ds_url_curriculo.mimes' => 'O arquivo deve ter extensão: pdf',
            'ds_url_foto_usuario.mimes' => 'O arquivo deve ter extensão: png, jpg ou jpeg',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $curriculo = $this->file('ds_url_curriculo');
            $foto = $this->file('ds_url_foto_usuario');

            // Verifica se a imagem é 1000px de largura e altura
            if($foto){
                $imageSize = getimagesize($foto->getPathname());

                if($imageSize) {
                    $widthImg = $imageSize[0];      // Largura
                    $heightImg = $imageSize[1];     // Altura
    
                    if($widthImg != 1000 && $heightImg != 1000) {
                        $validator->errors()->add('ds_url_foto_usuario', 'A imagem deve ter exatamente 1000px de largura e altura');
                    }
                } else {
                    $validator->errors()->add('ds_url_foto_usuario', 'O arquivo enviado não é uma imagem válida');
                }
            }

            // Verifica se ambos os campos estão vazios
            if (empty($curriculo) && empty($foto)) {
                $validator->errors()->add('ds_url_curriculo', 'Pelo menos um dos campos deve ser preenchido');
                $validator->errors()->add('ds_url_foto_usuario', 'Pelo menos um dos campos deve ser preenchido');
            }
        });
    }
}