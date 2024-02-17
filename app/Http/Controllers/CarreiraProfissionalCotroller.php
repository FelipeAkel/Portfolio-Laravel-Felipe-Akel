<?php

namespace App\Http\Controllers;

use App\Models\TbCarreiraProfissional;
use App\Models\TbTipoExperiencia;

use Illuminate\Http\Request;
use App\Http\Requests\CarreiraProfissionalFormRequest;

use Brian2694\Toastr\Facades\Toastr;


class CarreiraProfissionalCotroller extends Controller
{
    public function index(Request $request)
    {
        // "no_experiencia" => "teste"
        // "dt_inicio" => "2024-02-13"
        // "dt_final" => "2024-02-14"
        // $dataInicio = '';
        // if($request->input('dt_inicio')){
        //     dd($request->all());
        // }
    
        $retornoTipoExperiencia = TbTipoExperiencia::all();

        $retornoCarreiraProfissional = TbCarreiraProfissional::where('id', '>=', 1)
        ->paginate(10);

        // Recuperando dados de um relacionamento
        foreach($retornoCarreiraProfissional AS $indice => $dadosCarreira){
            $tipoExperiencia = TbTipoExperiencia::where('id', '=', $dadosCarreira->id_tipo_experiencia)->first();
            $retornoCarreiraProfissional[$indice]['no_tipo_experiencia'] = $tipoExperiencia->no_tipo_experiencia;
        }

        return view('template-admin.carreira-profissional.index', compact('retornoCarreiraProfissional', 'retornoTipoExperiencia'));
    }

    public function create()
    {        
        $retornoTipoExperiencia = TbTipoExperiencia::all();
        return view('template-admin.carreira-profissional.create', compact('retornoTipoExperiencia'));
    }

    public function store(CarreiraProfissionalFormRequest $request)
    {
        $carreiraProfissional = new TbCarreiraProfissional();
        $retornoBanco = $carreiraProfissional->create($request->all());

        if($retornoBanco == true){
            Toastr::success('O registro foi cadastrado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar o registro', 'Erro');
        }

        return redirect()->route('carreira-profissional.index');
    }

    public function show($id)
    {
        $carreiraProfissional = TbCarreiraProfissional::find($id);
        $tipoExperiencia = TbTipoExperiencia::find($carreiraProfissional->id_tipo_experiencia);
        $carreiraProfissional['no_tipo_experiencia'] = $tipoExperiencia->no_tipo_experiencia;
        return view('template-admin.carreira-profissional.show', compact('carreiraProfissional'));
    }

    public function edit($id)
    {
        $carreiraProfissional = TbCarreiraProfissional::find($id);
        $retornoTipoExperiencia = TbTipoExperiencia::all();
        return view('template-admin.carreira-profissional.edit', compact('retornoTipoExperiencia', 'carreiraProfissional'));
    }

    public function update(CarreiraProfissionalFormRequest $request, $id)
    {
        $carreiraProfissional = TbCarreiraProfissional::find($id);
        $retornoBanco = $carreiraProfissional->update($request->all());

        if($retornoBanco == true){
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
            Toastr::success('O registro foi deletado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível deletar o registro', 'Erro');
        }

        return redirect()->route('carreira-profissional.index');
    }
}