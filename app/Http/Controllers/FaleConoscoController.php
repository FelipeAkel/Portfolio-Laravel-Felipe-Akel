<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResponderFormRequest;

use App\Models\TbRespostas;
use App\Models\TbStatus;
use App\Models\TbFaleConosco;

use Brian2694\Toastr\Facades\Toastr;

class FaleConoscoController extends Controller
{

    public function index()
    {
        $status = TbStatus::all();
        $faleConosco = TbFaleConosco::where('id', '>=', 1)->orderBy('created_at', 'DESC')->paginate(10);

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

        $respostas = TbRespostas::where('id_fale_conosco', '=', $id)->orderBy('created_at', 'DESC')->paginate(5);
        
        return view('template-admin.fale-conosco.show', compact('faleConosco', 'respostas'));
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

        $respostas = TbRespostas::where('id_fale_conosco', '=', $id)->orderBy('created_at', 'DESC')->paginate(5);

        return view('template-admin.fale-conosco.responder', compact('status', 'faleConosco', 'respostas'));
    }

    public function responderStore(ResponderFormRequest $request, $id)
    {
        // Atualizando o Status da solicitação Fale Conosco
        $faleConosco = TbFaleConosco::find($id);
        $retornoBancoFaleConosco = $faleConosco->update(['id_status' => $request['id_status']]);
        
        // Insert da resposta na tabela
        $request['id_fale_conosco'] = $id;
        $retornoBancoResposta = TbRespostas::create($request->all());

        
        if($retornoBancoFaleConosco == true && $retornoBancoResposta == true){

            // ACRESCENTAR A FUNCIONALIDADE DE ENVIO DE E-MAIL AQUI
            // ACRESCENTAR A FUNCIONALIDADE DE ENVIO DE E-MAIL AQUI
            // ACRESCENTAR A FUNCIONALIDADE DE ENVIO DE E-MAIL AQUI
            // ACRESCENTAR A FUNCIONALIDADE DE ENVIO DE E-MAIL AQUI
            
            Toastr::success('A resposta foi cadastrada', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar a resposta', 'Erro');
        }

        return redirect()->route('fale-conosco.show', $id);
    }

}
