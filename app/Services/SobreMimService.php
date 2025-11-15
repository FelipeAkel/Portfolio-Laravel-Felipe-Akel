<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SobreMimService 
{

    public static function updateArquivosPdfFoto($request, $sobreMim) 
    {
        $urlCurriculo = $sobreMim->ds_url_curriculo;
        $urlFoto = $sobreMim->ds_url_foto_usuario;

        $deleteCurriculo = false;
        $deleteFoto = false;
        
        if($request->file('ds_url_curriculo')){
            $curriculo = $request->file('ds_url_curriculo');
            $nomeOriginal = pathinfo($curriculo->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao = $curriculo->getClientOriginalExtension();
            $nomeArquivo = $nomeOriginal . '_' . now()->format('d-m-Y') . '.' . $extensao;
            $urlCurriculo = $curriculo->storeAs('sobre-mim', $nomeArquivo, 'public');
            // Evita que o arquivo de mesmo nome anterior seja deletado, deleta arquivo antigo
            if($sobreMim->ds_url_curriculo != $urlCurriculo){
                $deleteCurriculo = Storage::disk('public')->delete($sobreMim->ds_url_curriculo);
            }
        }

        if($request->file('ds_url_foto_usuario')){
            $foto = $request->file('ds_url_foto_usuario');
            $nomeOriginal = pathinfo($foto->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao = $foto->getClientOriginalExtension();
            $nomeArquivo = $nomeOriginal . '.' . $extensao;
            $urlFoto = $foto->storeAs('sobre-mim', $nomeArquivo, 'public');
            // Evita que o arquivo de mesmo nome anterior seja deletado, deleta arquivo antigo
            if($sobreMim->ds_url_foto_usuario != $urlFoto){
                $deleteFoto = Storage::disk('public')->delete($sobreMim->ds_url_foto_usuario);
            }
        }

        $countDeletes = 0;
        if($deleteCurriculo === true){
            $countDeletes = $countDeletes + 1;
        }
        if($deleteFoto === true){
            $countDeletes = $countDeletes + 1;
        }

        $retorno = ['ds_url_curriculo' => $urlCurriculo, 'ds_url_foto_usuario' => $urlFoto, 'countDeletes' => $countDeletes];
        return $retorno;

    }

}