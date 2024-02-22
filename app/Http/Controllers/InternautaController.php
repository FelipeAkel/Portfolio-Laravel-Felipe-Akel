<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbTipoExperiencia;
use App\Models\TbTipoHabilidade;
use App\Models\TbCarreiraProfissional;
use App\Models\TbHabilidades;
use App\Models\TbServicos;
use App\Models\TbFaleConosco;
use App\Http\Requests\InternautaFormRequest;
use Brian2694\Toastr\Facades\Toastr;

class InternautaController extends Controller
{
    public function index(){
        // Experiencia de Trabalho
        $tipoCarreiraProfissional = TbTipoExperiencia::whereIn('id', [1, 2, 3])->get();
        $carreiraProfissional = TbCarreiraProfissional::all();

        $cursoComplementar = TbCarreiraProfissional::where('id_tipo_experiencia', '=', 4)->orderBy('dt_inicio', 'DESC')->get();
        $totalCursoComplementar = count($cursoComplementar);
        $totalHorasAulas = null;
        if($totalCursoComplementar != 0){
            foreach($cursoComplementar AS $indice => $dadosCursoComplementar){
                $totalHorasAulas = $totalHorasAulas + $dadosCursoComplementar->nr_total_horas;
            }
        }
        $arrayDadosTotais = ['totalCursoComplementar' => $totalCursoComplementar, 'totalHorasAulas' => $totalHorasAulas];
        // FIM - Experiencia de Trabalho

        // Habilidades
        $tipoHabilidade = TbTipoHabilidade::all();
        $habilidade = TbHabilidades::where('id', '>=', 1)
            ->orderBy('id_tipo_habilidade', 'ASC')
            ->orderBy('nr_ordenacao', 'ASC')
            ->get();
        // FIM - Habilidades

        // Serviços
        $servicos = TbServicos::all();
        // FIM - Serviços

        return view('template-internauta.index', compact(
            'tipoCarreiraProfissional',
            'carreiraProfissional', 
            'arrayDadosTotais', 
            'cursoComplementar', 
            'tipoHabilidade', 
            'habilidade',
            'servicos'
        ));
    }

    // Cadastro das mensagem do Fale Conosco, página internauta Contato.
    public function store(InternautaFormRequest $request)
    {
        $request['id_status'] = 1; // Requisição Recebida
        $retornoBanco = TbFaleConosco::create($request->all());

        if($retornoBanco == true){
            Toastr::success('Sua mensagem Fale Conosco foi cadastrada', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar sua mensagem do Fale Conosco, desculpe!', 'Erro');
        }

        return redirect()->route('internauta.index');
    }
}
