<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InternautaFormRequest;
use App\Repositories\InternautaRepository;
use Brian2694\Toastr\Facades\Toastr;

class InternautaController extends Controller
{
    protected $internautaRepository;

    public function __construct(
        InternautaRepository $internautaRepository
    ){
        $this->internautaRepository = $internautaRepository;
    }

    public function index()
    {
        $sobreMim = $this->internautaRepository::first();
        
        // Experiencia de Trabalho
        $tipoCarreiraProfissional = $this->internautaRepository::tipoExperiencia();
        
        $carreiraProfissional = $this->internautaRepository::carreiraProfissionalAll();

        $cursoComplementar = $this->internautaRepository::cursosComplementares();
        $totalCursoComplementar = count($cursoComplementar);
        
        $totalHorasAulas = null;
        if($totalCursoComplementar != 0){
            foreach($cursoComplementar AS $indice => $dadosCursoComplementar){
                $totalHorasAulas = $totalHorasAulas + $dadosCursoComplementar->nr_total_horas;
            }
        }
        $arrayDadosTotais = ['totalCursoComplementar' => $totalCursoComplementar, 'totalHorasAulas' => $totalHorasAulas];
        // FIM - Experiencia de Trabalho

        $tipoHabilidade = $this->internautaRepository::tipoHabilidadeAll();
        $habilidade = $this->internautaRepository::habilidades();

        $portfolio = $this->internautaRepository::portfolioAll();

        $servicos = $this->internautaRepository::servicosAll();

        return view('template-internauta.index', compact(
            'sobreMim',
            'tipoCarreiraProfissional',
            'carreiraProfissional', 
            'arrayDadosTotais', 
            'cursoComplementar', 
            'tipoHabilidade', 
            'habilidade',
            'portfolio',
            'servicos'
        ));
    }

    // Cadastro das mensagem do Fale Conosco, página internauta Contato.
    public function store(InternautaFormRequest $request)
    {
        $request['id_status'] = 1; // Requisição Recebida
        $retornoBanco = $this->internautaRepository::faleConoscoCreate($request);
        
        if($retornoBanco == true){
            Toastr::success('Sua mensagem Fale Conosco foi cadastrada', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar sua mensagem do Fale Conosco, desculpe!', 'Erro');
        }
        return redirect()->route('internauta.index');
    }
    // FIM - Cadastro das mensagem do Fale Conosco, página internauta Contato.

}