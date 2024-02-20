<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbServicos;

class ServicosController extends Controller
{
    public function index()
    {
        $servicos = TbServicos::where('id', '>=', '1')->orderBy('no_servico', 'ASC')->paginate(10);
        return view('template-admin.servicos.index', compact('servicos'));
    }

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

    public function show($id)
    {
        // dd($id);
        $servico = TbServicos::find($id);
        return view('template-admin.servicos.show', compact('servico'));
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
