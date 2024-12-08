<?php

namespace App\Services\Servicos;

use Illuminate\Support\Facades\Storage;

class ServicosService 
{
    public function arquivosImgs($request, $servico)
    {
        // TO DO - Melhoria: Salvar imagens em uma tabela de arquivos...
        // Salva e Deleta as imgs na pasta public
        if($request->file('file_icon_svg')){
            $icone = $request->file('file_icon_svg');
            $urlIcone = $icone->store('servicos/icones', 'public');
            if($servico !== null){
                Storage::disk('public')->delete($servico->ds_url_icon_svg);
            }
            $request['ds_url_icon_svg'] = $urlIcone;
        }
        if($request->file('file_img')){
            $imagem = $request->file('file_img');
            $urlImagem = $imagem->store('servicos', 'public');
            if($servico !== null){
                Storage::disk('public')->delete($servico->ds_url_img);
            }
            $request['ds_url_img'] = $urlImagem;
        }

        return $request;
    }

    public function deleteImgsPasta($servico)
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