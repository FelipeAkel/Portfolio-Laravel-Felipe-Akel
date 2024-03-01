<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbSobreMim;
use App\Models\TbTipoExperiencia;
use App\Models\TbTipoHabilidade;
use App\Models\TbCarreiraProfissional;
use App\Models\TbHabilidades;
use App\Models\TbPortfolio;
use App\Models\TbServicos;
use App\Models\TbFaleConosco;
use App\Http\Requests\InternautaFormRequest;
use Brian2694\Toastr\Facades\Toastr;

class InternautaController extends Controller
{
    public function index(){

        // Sobre Mim
        $sobreMim = TbSobreMim::all()->first();
            // dd($sobreMim);
        // FIM - Sobre Mim

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

        // Portfólio
        $portfolio = TbPortfolio::all();
        // foreach($portfolio AS $indice => $dadosProjeto){
        //     dd($portfolio);
        //     $this->strposDsTipoProjeto($indice, $dadosProjeto->ds_tipo_projeto);
        // }
        // dd($portfolio);
        // FIM - Portfólio

        // Serviços
        $servicos = TbServicos::all();
        // FIM - Serviços

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
        $retornoBanco = TbFaleConosco::create($request->all());

        if($retornoBanco == true){
            Toastr::success('Sua mensagem Fale Conosco foi cadastrada', 'Sucesso');
        } else {
            Toastr::error('Não foi possível cadastrar sua mensagem do Fale Conosco, desculpe!', 'Erro');
        }

        return redirect()->route('internauta.index');
    }

    // public function strposDsTipoProjeto ($indice, $portfolio){
    //     // Verifica e recuperar os valores do checkbox - Tipo de Projeto
    //     $verifica_php_laravel = strpos($portfolio->ds_tipo_projeto, 'php-laravel');
    //     $verifica_php_laravel === false ? $tipo_php_laravel = null : $tipo_php_laravel = 'php-laravel';

    //     $verifica_website = strpos($portfolio->ds_tipo_projeto, 'website');
    //     $verifica_website === false ? $tipo_website = null : $tipo_website = 'website';

    //     $verifica_landing_page = strpos($portfolio->ds_tipo_projeto, 'landing-page');
    //     $verifica_landing_page === false ? $tipo_landing_page = null : $tipo_landing_page = 'landing-page';

    //     $portfolio[$indice]['tipo_php_laravel'] = $tipo_php_laravel;
    //     $portfolio[$indice]['tipo_website'] = $tipo_website;
    //     $portfolio[$indice]['tipo_landing_page'] = $tipo_landing_page;


    // }
}
