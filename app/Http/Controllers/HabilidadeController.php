<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Habilidade\StoreUpdateFormRequest;
use App\Http\Requests\Habilidade\IndexFormRequest;
use App\Models\TbTipoHabilidade;
use App\Models\TbHabilidades;
use App\Models\TbLogsSistema;
use App\Repositories\Habilidade\HabilidadeRepository;
use App\Repositories\Habilidade\TipoHabilidadeRepository;

use Brian2694\Toastr\Facades\Toastr;

class HabilidadeController extends Controller
{
    protected $tipoHabilidadeRepository;
    protected $habilidadeRepository;

    public function __construct(
        TipoHabilidadeRepository $tipoHabilidadeRepository, 
        HabilidadeRepository $habilidadeRepository
    ) {
        $this->tipoHabilidadeRepository = $tipoHabilidadeRepository;
        $this->habilidadeRepository = $habilidadeRepository;
    }

    // TO DO - Melhoria: A URL está passando todos os valores no filtro
    public function index(IndexFormRequest $request)
    {
        $retornoHabilidade = $this->habilidadeRepository::index($request);
        $retornoTipoHabilidade = $this->tipoHabilidadeRepository::all();
        
        return view('template-admin.habilidade.index', compact('retornoTipoHabilidade', 'retornoHabilidade'));
    }

    public function create()
    {
        $retornoTipoHabilidade = $this->tipoHabilidadeRepository::all();
        return view('template-admin.habilidade.create', compact('retornoTipoHabilidade'));
    }

    public function store(StoreUpdateFormRequest $request)
    {
        $retornoBanco = $this->habilidadeRepository::store($request);

        if($retornoBanco == true){
            $this->logsSistemaStore(6, 'Habilidade');

            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    public function edit($id)
    {
        $habilidade = $this->habilidadeRepository::find($id);
        $retornoTipoHabilidade = $this->tipoHabilidadeRepository::all();

        return view('template-admin.habilidade.edit', compact('habilidade', 'retornoTipoHabilidade'));
    }

    public function update(StoreUpdateFormRequest $request, $id)
    {
        $retornoBanco = $this->habilidadeRepository::update($id, $request);

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Habilidade - ID: ' . $id);

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
            $this->logsSistemaStore(8, 'Habilidade - ID: ' . $id);

            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    // TO DO - Arquitetura - Colocar logsSistemaStore para acesso geral, para não criar em cada controller, criar no __construct algo similar
    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }
}