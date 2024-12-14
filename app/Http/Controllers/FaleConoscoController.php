<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FaleConosco\ResponderFormRequest;
use App\Http\Requests\FaleConosco\IndexFormRequest;
use App\Mail\respostaFaleConoscoEmail;
use App\Repositories\FaleConosco\FaleConoscoRepository;
use App\Repositories\FaleConosco\StatusRepository;
use App\Repositories\FaleConosco\RespostasRepository;
use Brian2694\Toastr\Facades\Toastr;

class FaleConoscoController extends Controller
{
    protected $faleConoscoRepository;
    protected $statusRepository;
    protected $respostasRepository;

    public function __construct(
        FaleConoscoRepository $faleConoscoRepository,
        StatusRepository $statusRepository,
        RespostasRepository $respostasRepository
    ){
        $this->faleConoscoRepository = $faleConoscoRepository;
        $this->statusRepository = $statusRepository;
        $this->respostasRepository = $respostasRepository;
    }

    public function index(IndexFormRequest $request)
    {
        $status = $this->statusRepository::statusFaleConosco();
        $faleConosco = $this->faleConoscoRepository::index($request);
        
        return view('template-admin.fale-conosco.index', compact('status', 'faleConosco'));
    }

    public function show($id)
    {
        $faleConosco = $this->faleConoscoRepository::find($id);
        $respostas = $this->respostasRepository::faleConosco($id);
        
        return view('template-admin.fale-conosco.show', compact('faleConosco', 'respostas'));
    }

    public function responder($id)
    {
        $status = $this->statusRepository::statusFaleConosco();
        $faleConosco = $this->faleConoscoRepository::find($id);
        $respostas = $this->respostasRepository::faleConosco($id);
        
        return view('template-admin.fale-conosco.responder', compact('status', 'faleConosco', 'respostas'));
    }

    public function responderStore(ResponderFormRequest $request, $id)
    {
        $faleConosco = $this->faleConoscoRepository::find($id);
        $retornoBanco = $this->faleConoscoRepository::responderStore($id, $request);
        
        if($retornoBanco == true){

            // Notificação do internauta por e-mail
            if($request->st_notificacao_email == 1){
                
                $status = $this->statusRepository::find($request['id_status']);

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
            
            Toastr::success('A resposta foi cadastrada', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar a resposta', 'Erro');
        }

        return redirect()->route('fale-conosco.show', $id);
    }

}