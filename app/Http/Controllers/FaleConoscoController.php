<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResponderFormRequest;
use App\Models\TbRespostas;
use App\Models\TbStatus;
use App\Models\TbFaleConosco;
use App\Models\TbLogsSistema;
use Illuminate\Support\Facades\Mail;
use App\Mail\respostaFaleConoscoEmail;

use Brian2694\Toastr\Facades\Toastr;

class FaleConoscoController extends Controller
{

    public function index()
    {
        $status = TbStatus::find([1, 2, 3, 4, 5]);
        $faleConosco = TbFaleConosco::with('status')->where('id', '>=', 1)->orderBy('created_at', 'DESC')->paginate(10);

        return view('template-admin.fale-conosco.index', compact('status', 'faleConosco'));
    }

    public function show($id)
    {
        $faleConosco = TbFaleConosco::with('status')->find($id);
        $respostas = TbRespostas::where('id_fale_conosco', '=', $id)->orderBy('created_at', 'DESC')->paginate(5);
        
        return view('template-admin.fale-conosco.show', compact('faleConosco', 'respostas'));
    }

    public function responder($id)
    {
        $status = TbStatus::find([1, 2, 3, 4, 5]);
        $faleConosco = TbFaleConosco::with('status')->find($id);
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

            // Notificação do internauta por e-mail
            if($request->st_notificacao_email == 1){

                $status = TbStatus::find($request['id_status']);

                $parametrosEmail = [
                    'nomeContato' => $faleConosco->no_contato,
                    'assunto' => $faleConosco->ds_assunto,
                    'mensagem' => $faleConosco->ds_mensagem,
                    'status' => $status->no_status,
                    'resposta' => $request->ds_resposta,
                ];
    
                Mail::to($faleConosco->ds_email)->send(new respostaFaleConoscoEmail($parametrosEmail));

                Toastr::info('Internauta notificado por e-mail', 'Informe');

            }
            
            $this->logsSistemaStore(9, 'Fale Conosco - ID: ' . $id);

            Toastr::success('A resposta foi cadastrada', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar a resposta', 'Erro');
        }

        return redirect()->route('fale-conosco.show', $id);
    }

    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }

}
