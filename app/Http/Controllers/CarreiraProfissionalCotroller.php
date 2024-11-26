<?php

namespace App\Http\Controllers;

use App\Models\TbCarreiraProfissional;
use App\Models\TbTipoExperiencia;
use App\Models\TbLogsSistema;
use Illuminate\Http\Request;
use App\Http\Requests\CarreiraProfissionalFormRequest;

use App\Repositories\CarreiraProfissional\TipoExperienciaRepository;
use App\Repositories\CarreiraProfissional\CarreiraProfissionalRepository;

use Brian2694\Toastr\Facades\Toastr;

class CarreiraProfissionalCotroller extends Controller
{
    protected $carreiraProfissionalRepository;
    protected $tipoExperienciaRepository;

    public function __construct(
        CarreiraProfissionalRepository $carreiraProfissionalRepository,
        TipoExperienciaRepository $tipoExperienciaRepository
    ) {
        $this->carreiraProfissionalRepository = $carreiraProfissionalRepository;
        $this->tipoExperienciaRepository = $tipoExperienciaRepository;
    }

    public function index(Request $request)
    {
        $retornoTipoExperiencia = $this->tipoExperienciaRepository::all();
        $retornoCarreiraProfissional = $this->carreiraProfissionalRepository::index($request);

        return view('template-admin.carreira-profissional.index', compact('retornoCarreiraProfissional', 'retornoTipoExperiencia'));
    }

    public function create()
    {        
        $retornoTipoExperiencia = $this->tipoExperienciaRepository::all();
        return view('template-admin.carreira-profissional.create', compact('retornoTipoExperiencia'));
    }

    public function store(CarreiraProfissionalFormRequest $request)
    {
        $retornoBanco = TbCarreiraProfissional::create($request->all());

        if($retornoBanco == true){
            $this->logsSistemaStore(6, 'Carreira Profissional');

            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('carreira-profissional.index');
    }

    public function show($id)
    {
        $carreiraProfissional = TbCarreiraProfissional::with("tipoExperiencia")->find($id);
        return view('template-admin.carreira-profissional.show', compact('carreiraProfissional'));
    }

    public function edit($id)
    {
        $carreiraProfissional = TbCarreiraProfissional::find($id);
        $retornoTipoExperiencia = $this->tipoExperienciaRepository::all();
        return view('template-admin.carreira-profissional.edit', compact('retornoTipoExperiencia', 'carreiraProfissional'));
    }

    public function update(CarreiraProfissionalFormRequest $request, $id)
    {
        $carreiraProfissional = TbCarreiraProfissional::find($id);
        $retornoBanco = $carreiraProfissional->update($request->all());

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Carreira Profissional - ID: ' . $id);

            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizar o registro', 'Erro');
        }

        return redirect()->route('carreira-profissional.index');
    }

    public function destroy( $id)
    {
        $carreiraProfissional = TbCarreiraProfissional::find($id);
        $retornoBanco = $carreiraProfissional->delete();

        if($retornoBanco == true){
            $this->logsSistemaStore(8, 'Carreira Profissional - ID: ' . $id);

            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('carreira-profissional.index');
    }

    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }
}