<?php

namespace App\Http\Controllers;

use App\Models\TbCarreiraProfissional;
use App\Models\TbTipoExperiencia;

use Illuminate\Http\Request;
use App\Http\Requests\CarreiraProfissionalFormRequest;

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
        // dd($retornoTipoExperiencia)
;        return view('template-admin.carreira-profissional.create', compact('retornoTipoExperiencia'));
    }

    public function store(CarreiraProfissionalFormRequest $request)
    {
        // dd($request->all());
        $carreiraProfissional = new TbCarreiraProfissional();
        $retornoBanco = $carreiraProfissional->create($request->all());

        if($retornoBanco == true){
            dd('sucesso');
        } else {
            dd('erro');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
