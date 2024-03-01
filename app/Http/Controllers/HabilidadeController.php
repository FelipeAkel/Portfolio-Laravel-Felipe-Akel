<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HabilidadeFormRequest;

use App\Models\TbTipoHabilidade;
use App\Models\TbHabilidades;

use Brian2694\Toastr\Facades\Toastr;


class HabilidadeController extends Controller
{
    public function index()
    {
        $retornoTipoHabilidade = TbTipoHabilidade::all();
        $retornoHabilidade = TbHabilidades::with('tipoHabilidade')->where('id', '>=', 1)->paginate(10);

        return view('template-admin.habilidade.index', compact('retornoTipoHabilidade', 'retornoHabilidade'));
    }

    public function create()
    {
        $retornoTipoHabilidade = TbTipoHabilidade::all();
        return view('template-admin.habilidade.create', compact('retornoTipoHabilidade'));
    }

    public function store(HabilidadeFormRequest $request)
    {
        $retornoBanco = TbHabilidades::create($request->all());

        if($retornoBanco == true){
            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    public function edit($id)
    {
        $habilidade = TbHabilidades::find($id);
        $retornoTipoHabilidade = TbTipoHabilidade::all();

        return view('template-admin.habilidade.edit', compact('habilidade', 'retornoTipoHabilidade'));
    }

    public function update(HabilidadeFormRequest $request, $id)
    {
        $habilidade = TbHabilidades::find($id);
        $retornoBanco = $habilidade->update($request->all());

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizados', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    public function destroy($id)
    {
        $habilidade = TbHabilidades::find($id);
        $retornoBanco = $habilidade->delete();

        if($retornoBanco == true){
            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }
}
