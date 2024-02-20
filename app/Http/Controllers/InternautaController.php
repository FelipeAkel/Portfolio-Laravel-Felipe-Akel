<?php

namespace App\Http\Controllers;

use App\Models\TbTipoExperiencia;
use App\Models\TbTipoHabilidade;
use Illuminate\Http\Request;
use App\Models\TbCarreiraProfissional;
use App\Models\TbHabilidades;

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

        return view('template-internauta.index', compact(
            'tipoCarreiraProfissional',
            'carreiraProfissional', 
            'arrayDadosTotais', 
            'cursoComplementar', 
            'tipoHabilidade', 
            'habilidade'
        ));
    }
}
