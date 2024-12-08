<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use App\Models\TbServicos;
    use App\Models\TbLogsSistema;
use App\Http\Requests\ServicosFormRequest;

use Brian2694\Toastr\Facades\Toastr;

use App\Services\Servicos\ServicosService;

use App\Repositories\ServicosRepository;

class ServicosController extends Controller
{
    protected $servicosService;
    protected $servicosRepository;

    public function __construct(
        ServicosService $servicosService,
        ServicosRepository $servicosRepository
    ){
        $this->servicosService = $servicosService;
        $this->servicosRepository = $servicosRepository;
    }

    public function index()
    {
        $servicos = $this->servicosRepository::index();
        return view('template-admin.servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('template-admin.servicos.create');
    }

    public function store(ServicosFormRequest $request)
    {
        $this->servicosService::arquivosImgs($request, null);
        
        $retornoBanco = $this->servicosRepository::store($request);
        
        if($retornoBanco == true){
            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('servicos.index');
    }

    public function show($id)
    {
        $servico = $this->servicosRepository::find($id);
        return view('template-admin.servicos.show', compact('servico'));
    }

    public function edit($id)
    {
        $servico = $this->servicosRepository::find($id);
        return view('template-admin.servicos.edit', compact('servico'));
    }

    public function update(ServicosFormRequest $request, $id)
    {
        $servico = $this->servicosRepository::find($id);

        $this->servicosService::arquivosImgs($request, $servico);

        $retornoBanco = $this->servicosRepository::update($id, $request);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('servicos.show', $servico->id);
    }

    public function destroy($id)
    {
        $servico = $this->servicosRepository::find($id);
        $retornoBanco = $this->servicosRepository::destroy($id);

        $countImgDeletadas = $this->servicosService::deleteImgsPasta($servico);
        Toastr::info("Total de $countImgDeletadas imagens deletadas", 'Informação');

        if($retornoBanco == true){
            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletado o registro', 'Erro');
        }

        return redirect()->route('servicos.index');
    }

}