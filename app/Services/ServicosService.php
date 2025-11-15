<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ServicosService 
{
    public static function arquivosImgs($request, $servico)
    {
        // Salva e Deleta as imgs na pasta public
        $deleteIcon = false;
        $deleteImg = false;

        if($request->file('file_icon_svg')){
            $icone = $request->file('file_icon_svg');
            
            $nomeOriginal = pathinfo($icone->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao = $icone->getClientOriginalExtension();
            $nomeArquivo = $nomeOriginal . '.' . $extensao;
            
            $urlIcone = $icone->storeAs('servicos/icones', $nomeArquivo, 'public');

            if($servico !== null && $servico->ds_url_icon_svg != $urlIcone){
                $deleteIcon = Storage::disk('public')->delete($servico->ds_url_icon_svg);
            }
            $request['ds_url_icon_svg'] = $urlIcone;
        }
        if($request->file('file_img')){
            $imagem = $request->file('file_img');

            $nomeOriginal = pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao = $imagem->getClientOriginalExtension();
            $nomeArquivo = $nomeOriginal . '.' . $extensao;

            $urlImagem = $imagem->storeAs('servicos', $nomeArquivo, 'public');

            if($servico !== null && $servico->ds_url_img != $urlImagem){
                $deleteImg = Storage::disk('public')->delete($servico->ds_url_img);
            }
            $request['ds_url_img'] = $urlImagem;
        }

        $countDeletes = 0;
        if($deleteIcon === true){
            $countDeletes = $countDeletes + 1;
        }
        if($deleteImg === true){
            $countDeletes = $countDeletes + 1;
        }

        $request['countDeletes'] = $countDeletes;

        return $request;
    }

    public static function deleteImgsPasta($servico)
    {
        $icon = Storage::disk('public')->delete($servico->ds_url_icon_svg);
        $img = Storage::disk('public')->delete($servico->ds_url_img);

        $countDelete = 0;
        if($icon === true){
            $countDelete = $countDelete + 1; 
        }
        if($img === true){
            $countDelete = $countDelete + 1; 
        }

        return $countDelete;
    }
}