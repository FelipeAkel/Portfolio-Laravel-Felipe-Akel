<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PortfolioFormRequest;
use App\Models\TbPortfolio;

use Brian2694\Toastr\Facades\Toastr;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = TbPortfolio::where('id', '>=', 1)->paginate(10);
        return view('template-admin.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('template-admin.portfolio.create');
    }

    public function store(PortfolioFormRequest $request)
    {
        $this->mesclarDsTipoProjeto($request);
        
        $retornoBanco = TbPortfolio::create($request->all());
        // SALVAR ARQUIVOS ANEXOS
        // SALVAR ARQUIVOS ANEXOS
        // SALVAR ARQUIVOS ANEXOS

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

    public function update(Request $request, $id)
    {
        $portfolio = TbPortfolio::find($id);

        $this->mesclarDsTipoProjeto($request);

        $retornoBanco = $portfolio->update($request->all());

        // SALVAR ARQUIVOS ANEXOS
        // SALVAR ARQUIVOS ANEXOS
        // SALVAR ARQUIVOS ANEXOS

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizar o registro', 'Erro');
        }

        return redirect()->route('portfolio.show', $id);
    }

    public function destroy($id)
    {
        $portfolio = TbPortfolio::find($id);

        $retornoBanco = $portfolio->delete();

        if($retornoBanco == true){
            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('portfolio.index');
    }

    
    public function mesclarDsTipoProjeto ($request){
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
}
