<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Portfolio\PortfolioFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\TbArquivos;
use App\Models\TbPortfolio;
use App\Models\TbLogsSistema;

use App\Services\Portfolio\PortfolioService;

use App\Repositories\PortfolioRepository;

use Brian2694\Toastr\Facades\Toastr;

class PortfolioController extends Controller
{
    protected $portfolioService;
    protected $portfolioRepository;

    public function __construct(
        PortfolioService $portfolioService,
        PortfolioRepository $portfolioRepository
    ) {
        $this->portfolioService = $portfolioService;
        $this->portfolioRepository = $portfolioRepository;
    }

    public function index()
    {
        $portfolio = $this->portfolioRepository::index();
        return view('template-admin.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('template-admin.portfolio.create');
    }

    public function store(PortfolioFormRequest $request)
    {
        $this->portfolioService::mesclarDsTipoProjeto($request);
        $retornoBanco = $this->portfolioRepository::store($request);
        
        if($retornoBanco == true){
            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }
        
        return redirect()->route('portfolio.index');
    }

    public function show($id) //
    {
        $portfolio = TbPortfolio::find($id);

        $this->strposDsTipoProjeto($portfolio);

        return view('template-admin.portfolio.show', compact('portfolio'));
    }


    public function edit($id)
    {
        $portfolio = TbPortfolio::find($id);

        $this->strposDsTipoProjeto($portfolio);

        return view('template-admin.portfolio.edit', compact('portfolio'));
    }

    public function update(PortfolioFormRequest $request, $id)
    {
        $portfolio = TbPortfolio::find($id);

        $this->portfolioService::mesclarDsTipoProjeto($request);

        if($request->file('file_img_destaque')){
            $imgDestaque = $request->file('file_img_destaque');
            $urlImgDestaque = $imgDestaque->store('portfolio', 'public');
            Storage::disk('public')->delete($portfolio->ds_url_img_destaque);
            $request['ds_url_img_destaque'] = $urlImgDestaque;
        }
        if($request->file('file_img_1_galeria')){
            $img1Galeria = $request->file('file_img_1_galeria');
            $urlImg1Galeria = $img1Galeria->store('portfolio', 'public');
            Storage::disk('public')->delete($portfolio->ds_url_img_1_galeria);
            $request['ds_url_img_1_galeria'] = $urlImg1Galeria;
        }
        if($request->file('file_img_2_galeria')){
            $img2Galeria = $request->file('file_img_2_galeria');
            $urlImg2Galeria = $img2Galeria->store('portfolio', 'public');
            Storage::disk('public')->delete($portfolio->ds_url_img_2_galeria);
            $request['ds_url_img_2_galeria'] = $urlImg2Galeria;
        }
        if($request->file('file_img_3_galeria')){
            $img3Galeria = $request->file('file_img_3_galeria');
            $urlImg3Galeria = $img3Galeria->store('portfolio', 'public');
            Storage::disk('public')->delete($portfolio->ds_url_img_3_galeria);
            $request['ds_url_img_3_galeria'] = $urlImg3Galeria;
        }

        $retornoBanco = $portfolio->update($request->all());

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Portfólio: Projeto - ID: ' . $id);

            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizar o registro', 'Erro');
        }

        return redirect()->route('portfolio.show', $id);
    }

    public function destroy($id)
    {
        $portfolio = TbPortfolio::find($id);

        Storage::disk('public')->delete($portfolio->ds_url_img_destaque);
        Storage::disk('public')->delete($portfolio->ds_url_img_1_galeria);
        Storage::disk('public')->delete($portfolio->ds_url_img_2_galeria);
        Storage::disk('public')->delete($portfolio->ds_url_img_3_galeria);

        $retornoBanco = $portfolio->delete();

        if($retornoBanco == true){
            $this->logsSistemaStore(8, 'Portfólio: Projeto - ID: ' . $id);

            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('portfolio.index');
    }

    public function strposDsTipoProjeto ($portfolio){
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
    }

    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }
}