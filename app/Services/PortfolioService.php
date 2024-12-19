<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

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

    public function strposDsTipoProjeto($portfolio)
    {
        // Verifica e recuperar os valores do checkbox - Tipo de Projeto
        $verifica_php_laravel = strpos($portfolio->ds_tipo_projeto, 'php-laravel');
        $verifica_php_laravel === false ? $tipo_php_laravel = null : $tipo_php_laravel = 'php-laravel';

        $verifica_website = strpos($portfolio->ds_tipo_projeto, 'website');
        $verifica_website === false ? $tipo_website = null : $tipo_website = 'website';

        $verifica_landing_page = strpos($portfolio->ds_tipo_projeto, 'landing-page');
        $verifica_landing_page === false ? $tipo_landing_page = null : $tipo_landing_page = 'landing-page';

        $portfolio['tipo_php_laravel'] = $tipo_php_laravel;
        $portfolio['tipo_website'] = $tipo_website;
        $portfolio['tipo_landing_page'] = $tipo_landing_page;
        return $portfolio;
    }

    public function arquivosImgs($request, $portfolio)
    {
        // TO DO - Melhoria: Salvar imagens em uma tabela de arquivos...
        // Deleta a img antiga da pasta e atualizar com a nova
        if($request->file('file_img_destaque')){
            $imgDestaque = $request->file('file_img_destaque');
            $urlImgDestaque = $imgDestaque->store('portfolio', 'public');
            if($portfolio !== null){
                Storage::disk('public')->delete($portfolio->ds_url_img_destaque);
            }
            $request['ds_url_img_destaque'] = $urlImgDestaque;
        }
        if($request->file('file_img_1_galeria')){
            $img1Galeria = $request->file('file_img_1_galeria');
            $urlImg1Galeria = $img1Galeria->store('portfolio', 'public');
            if($portfolio !== null){
                Storage::disk('public')->delete($portfolio->ds_url_img_1_galeria);
            }
            $request['ds_url_img_1_galeria'] = $urlImg1Galeria;
        }
        if($request->file('file_img_2_galeria')){
            $img2Galeria = $request->file('file_img_2_galeria');
            $urlImg2Galeria = $img2Galeria->store('portfolio', 'public');
            if($portfolio !== null){
                Storage::disk('public')->delete($portfolio->ds_url_img_2_galeria);
            }
            $request['ds_url_img_2_galeria'] = $urlImg2Galeria;
        }
        if($request->file('file_img_3_galeria')){
            $img3Galeria = $request->file('file_img_3_galeria');
            $urlImg3Galeria = $img3Galeria->store('portfolio', 'public');
            if($portfolio !== null){
                Storage::disk('public')->delete($portfolio->ds_url_img_3_galeria);
            }
            $request['ds_url_img_3_galeria'] = $urlImg3Galeria;
        }
        return $request;
    }

    public function deleteImgsPasta($portfolio)
    {
        $imgDestaque = Storage::disk('public')->delete($portfolio->ds_url_img_destaque);
        $img1 = Storage::disk('public')->delete($portfolio->ds_url_img_1_galeria);
        $img2 = Storage::disk('public')->delete($portfolio->ds_url_img_2_galeria);
        $img3 = Storage::disk('public')->delete($portfolio->ds_url_img_3_galeria);
        
        $countDelete = 0;
        if($imgDestaque === true){
            $countDelete = $countDelete + 1; 
        }
        if($img1 === true){
            $countDelete = $countDelete + 1; 
        }
        if($img2 === true){
            $countDelete = $countDelete + 1; 
        }
        if($img3 === true){
            $countDelete = $countDelete + 1; 
        }

        return $countDelete;
    }

}