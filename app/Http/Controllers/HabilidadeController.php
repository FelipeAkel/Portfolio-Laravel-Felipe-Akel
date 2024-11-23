<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Habilidade\StoreUpdateFormRequest;
use App\Http\Requests\Habilidade\IndexFormRequest;
use App\Models\TbTipoHabilidade;
use App\Models\TbHabilidades;
use App\Models\TbLogsSistema;

use Brian2694\Toastr\Facades\Toastr;

// TO DO - Arquitetura - Criar uma Service e Repository de Habilidades
class HabilidadeController extends Controller
{

    // TO DO - Melhoria: A URL está passando todos os valores no filtro
    public function index(IndexFormRequest $request)
    {
        $filtros = $request->only(['id_tipo_habilidade', 'nr_porcentagem', 'dt_created_inicio', 'dt_created_final']);
        
        $query = TbHabilidades::with('tipoHabilidade');
        
        if(!empty($filtros['id_tipo_habilidade'])) {
            $query->where('id_tipo_habilidade', '=', $filtros['id_tipo_habilidade']);
        }
        
        if(!empty($filtros['nr_porcentagem'])) {
            $query->where('nr_porcentagem', '=', $filtros['nr_porcentagem']);
        }
        
        if(!empty($filtros['dt_created_inicio'])) {
            $query->whereDate('created_at', '>=', $filtros['dt_created_inicio']);
        }

        if(!empty($filtros['dt_created_final'])) {
            $query->whereDate('created_at', '<=', $filtros['dt_created_final']);
        }
        
        $retornoHabilidade = $query
        ->orderBy('id_tipo_habilidade', 'ASC')
        ->orderBy('nr_ordenacao', 'ASC')
        ->paginate(10);
        
        $retornoTipoHabilidade = TbTipoHabilidade::all();
        
        return view('template-admin.habilidade.index', compact('retornoTipoHabilidade', 'retornoHabilidade'));
    }

    public function create()
    {
        $retornoTipoHabilidade = TbTipoHabilidade::all();
        return view('template-admin.habilidade.create', compact('retornoTipoHabilidade'));
    }

    public function store(StoreUpdateFormRequest $request)
    {
        $retornoBanco = TbHabilidades::create($request->all());

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
        $habilidade = TbHabilidades::find($id);
        $retornoTipoHabilidade = TbTipoHabilidade::all();

        return view('template-admin.habilidade.edit', compact('habilidade', 'retornoTipoHabilidade'));
    }

    public function update(StoreUpdateFormRequest $request, $id)
    {
        $habilidade = TbHabilidades::find($id);
        $retornoBanco = $habilidade->update($request->all());

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
        $habilidade = TbHabilidades::find($id);
        $retornoBanco = $habilidade->delete();

        if($retornoBanco == true){
            $this->logsSistemaStore(8, 'Habilidade - ID: ' . $id);

            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('habilidade.index');
    }

    // TO DO - Arquitetura - Colocar logsSistemaStore para acesso geral, para não criar em cada controller
    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }
}