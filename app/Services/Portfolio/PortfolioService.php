<?php
namespace App\Services\Portfolio;

class PortfolioService 
{
    public function mesclarDsTipoProjeto($request)
    {
        // mesclando os campos de checkbox em uma única variável para salvar no banco
        $ds_tipo_projeto = null;
        if($request->input('tipo_php_laravel')){
            $ds_tipo_projeto .= $request->input('tipo_php_laravel') . ' ';
        }
        if($request->input('tipo_website')){
            $ds_tipo_projeto .= $request->input('tipo_website') . ' ';
        }
        if($request->input('tipo_landing_page')){
            $ds_tipo_projeto .= $request->input('tipo_landing_page') . ' ';
        }
        $request['ds_tipo_projeto'] = $ds_tipo_projeto;
        return $request;
    }
}