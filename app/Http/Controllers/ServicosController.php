<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbServicos;
use App\Models\TbLogsSistema;
use App\Http\Requests\ServicosFormRequest;

use Brian2694\Toastr\Facades\Toastr;

class ServicosController extends Controller
{
    public function index()
    {
        $servicos = TbServicos::where('id', '>=', '1')->orderBy('no_servico', 'ASC')->paginate(10);
        return view('template-admin.servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('template-admin.servicos.create');
    }

    public function store(ServicosFormRequest $request)
    {
        $retornoBanco = TbServicos::create($request->all());
        if($retornoBanco == true){
            $this->logsSistemaStore(6, 'Serviço');

            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('servicos.index');
    }

    public function show($id)
    {
        $servico = TbServicos::find($id);
        return view('template-admin.servicos.show', compact('servico'));
    }

    public function edit($id)
    {
        $servico = TbServicos::find($id);
        return view('template-admin.servicos.edit', compact('servico'));
    }

    public function update(ServicosFormRequest $request, $id)
    {
        $servico = TbServicos::find($id);
        $retornoBanco = $servico->update($request->all());

        if($retornoBanco == true){

            $this->logsSistemaStore(7, 'Serviço - ID: ' . $id);

            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('servicos.show', $servico->id);
    }

    public function destroy($id)
    {
        $servico = TbServicos::find($id);
        $retornoBanco = $servico->delete();

        if($retornoBanco == true){
            $this->logsSistemaStore(8, 'Serviço - ID: ' . $id);

            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletado o registro', 'Erro');
        }

        return redirect()->route('servicos.index');
    }

    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }
}
