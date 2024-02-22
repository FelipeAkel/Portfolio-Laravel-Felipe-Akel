<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbStatus;
use App\Models\TbFaleConosco;

class FaleConoscoController extends Controller
{

    public function index()
    {
        $status = TbStatus::all();
        $faleConosco = TbFaleConosco::where('id', '>=', 1)->paginate(10);

        // Recuperando nome do Status pelo ID
        foreach($faleConosco AS $indice => $dadosFaleConosco){
            $recuperacaoStatus = TbStatus::where('id', '=', $dadosFaleConosco->id_status)->first();
            if($recuperacaoStatus){
                $faleConosco[$indice]['no_status'] = $recuperacaoStatus->no_status;
            }
        }

        return view('template-admin.fale-conosco.index', compact('status', 'faleConosco'));
    }

    public function show($id)
    {
        $faleConosco = TbFaleConosco::find($id);
        // Recuperando nome do Status pelo ID
        $recuperacaoStatus = TbStatus::where('id', '=', $faleConosco->id_status)->first();
        if($recuperacaoStatus){
            $faleConosco['no_status'] = $recuperacaoStatus->no_status;
        }
        
        return view('template-admin.fale-conosco.show', compact('faleConosco'));
    }

    public function responder($id)
    {
        $status = TbStatus::all();
        $faleConosco = TbFaleConosco::find($id);
        // Recuperando nome do Status pelo ID
        $recuperacaoStatus = TbStatus::where('id', '=', $faleConosco->id_status)->first();
        if($recuperacaoStatus){
            $faleConosco['no_status'] = $recuperacaoStatus->no_status;
        }

        return view('template-admin.fale-conosco.responder', compact('status', 'faleConosco'));
    }

    public function responderStore(Request $request, $id)
    {
        dd($id, $request->all());
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
