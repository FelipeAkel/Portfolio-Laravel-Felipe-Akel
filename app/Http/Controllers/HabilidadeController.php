<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Habilidade\StoreUpdateFormRequest;
use App\Http\Requests\Habilidade\IndexFormRequest;
use App\Repositories\HabilidadeRepository;
use Brian2694\Toastr\Facades\Toastr;

class HabilidadeController extends Controller
{
    protected $habilidadeRepository;

    public function __construct(
        HabilidadeRepository $habilidadeRepository
    ) {
        $this->habilidadeRepository = $habilidadeRepository;
    }

    public function index(IndexFormRequest $request)
    {
        $retornoHabilidade = $this->habilidadeRepository::index($request);
        $retornoTipoHabilidade = $this->habilidadeRepository::tipoHabilidadeAll();
        
        return view('template-admin.habilidade.index', compact('retornoTipoHabilidade', 'retornoHabilidade'));
    }

    public function create()
    {
        $retornoTipoHabilidade = $this->habilidadeRepository::tipoHabilidadeAll();
        
        return view('template-admin.habilidade.create', compact('retornoTipoHabilidade'));
    }

    public function store(StoreUpdateFormRequest $request)
    {
        $retornoBanco = $this->habilidadeRepository::store($request);

        if($retornoBanco == true){
            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    public function edit($id)
    {
        $habilidade = $this->habilidadeRepository::find($id);
        $retornoTipoHabilidade = $this->habilidadeRepository::tipoHabilidadeAll();
        
        return view('template-admin.habilidade.edit', compact('habilidade', 'retornoTipoHabilidade'));
    }

    public function update(StoreUpdateFormRequest $request, $id)
    {
        $retornoBanco = $this->habilidadeRepository::update($id, $request);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizados', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    public function destroy($id)
    {
        $retornoBanco = $this->habilidadeRepository::destroy($id);

        if($retornoBanco == true){
            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

}