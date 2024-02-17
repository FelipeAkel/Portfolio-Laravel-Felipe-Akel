<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbTipoHabilidade;
use App\Models\TbHabilidades;

class HabilidadeController extends Controller
{
    public function index()
    {
        $retornoTipoHabilidade = TbTipoHabilidade::all();
        $retornoHabilidade = TbHabilidades::all();

        foreach($retornoHabilidade AS $indice => $dadosHabilidade){
            $tipoHabilidade = TbTipoHabilidade::find($dadosHabilidade->id_tipo_habilidade)->first();
            if($tipoHabilidade){
                $retornoHabilidade[$indice]['no_tipo_habilidade'] = $tipoHabilidade->no_tipo_habilidade;
            }
        }
        // dd($retornoHabilidade);
        return view('template-admin.habilidade.index', compact('retornoTipoHabilidade', 'retornoHabilidade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
