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
        
        //Verificando se arquivo foi adicionado
        if($request->file('ds_url_curriculo')){
            // Lendo informações do arquivo selecionado
            $curriculo = $request->file('ds_url_curriculo');

            // 'Armazenando o arquivo na pasta storage do Laravel. 
                // 1º parametro 'sobre-mim 'se refere a pasta criada/existente.
                // 2º parametro 'public' se refere ao arquivo de configuração Disk - config/filesystems.php o qual define o diretório configurado do Storage.
            $urlCurriculo = $curriculo->store('sobre-mim', 'public');

            // Delete Arquivos Antigos ---- Adicionar na controller: use Illuminate\Support\Facades\Storage;
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