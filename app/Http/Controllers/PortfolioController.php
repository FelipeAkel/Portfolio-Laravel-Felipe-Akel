<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Portfolio\IndexFormRequest;
use App\Http\Requests\Portfolio\PortfolioFormRequest;
use App\Services\PortfolioService;
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

    public function index(IndexFormRequest $request)
    {
        $portfolio = $this->portfolioRepository::index($request);
        return view('template-admin.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('template-admin.portfolio.create');
    }

    public function store(PortfolioFormRequest $request)
    {
        $this->portfolioService::mesclarDsTipoProjeto($request);
        $this->portfolioService::arquivosImgs($request, null);
        
        $retornoBanco = $this->portfolioRepository::store($request);
        
        if($retornoBanco == true){
            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }
        
        return redirect()->route('portfolio.index');
    }

    public function show($id)
    {
        $portfolio = $this->portfolioRepository::find($id);

        $this->portfolioService::strposDsTipoProjeto($portfolio);

        return view('template-admin.portfolio.show', compact('portfolio'));
    }


    public function edit($id)
    {
        $portfolio = $this->portfolioRepository::find($id);

        $this->portfolioService::strposDsTipoProjeto($portfolio);

        return view('template-admin.portfolio.edit', compact('portfolio'));
    }

    public function update(PortfolioFormRequest $request, $id)
    {
        $portfolio = $this->portfolioRepository::find($id);

        $this->portfolioService::mesclarDsTipoProjeto($request);
        $this->portfolioService::arquivosImgs($request, $portfolio);
        
        $retornoBanco = $this->portfolioRepository::update($id, $request);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizar o registro', 'Erro');
        }

        return redirect()->route('portfolio.show', $id);
    }

    public function destroy($id)
    {
        $portfolio = $this->portfolioRepository::find($id);
        $retornoBanco = $this->portfolioRepository::destroy($id);

        $countImgDeletadas = $this->portfolioService::deleteImgsPasta($portfolio);
        Toastr::info("Total de $countImgDeletadas imagens deletadas", 'Informação');

        if($retornoBanco == true){
            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('portfolio.index');
    }

}