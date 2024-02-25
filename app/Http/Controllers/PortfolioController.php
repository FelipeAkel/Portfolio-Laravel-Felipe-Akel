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

    public function show() //$id
    {
        return view('template-admin.portfolio.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
