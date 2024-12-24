<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SobreMimService 
{

    public function updateArquivosPdfFoto($request, $sobreMim) 
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
            $deleteCurriculo = Storage::disk('public')->delete($sobreMim->ds_url_curriculo);
        }

        if($request->file('ds_url_foto_usuario')){
            $foto = $request->file('ds_url_foto_usuario');
            $urlFoto = $foto->store('sobre-mim', 'public');
            $deleteFoto = Storage::disk('public')->delete($sobreMim->ds_url_foto_usuario);
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