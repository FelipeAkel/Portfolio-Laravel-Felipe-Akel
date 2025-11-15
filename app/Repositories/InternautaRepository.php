<?php 
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\TbSobreMim;
use App\Models\TbTipoExperiencia;
use App\Models\TbTipoHabilidade;
use App\Models\TbCarreiraProfissional;
use App\Models\TbHabilidades;
use App\Models\TbPortfolio;
use App\Models\TbServicos;
use App\Models\TbFaleConosco;
use App\Models\TbLogsSistema;

class InternautaRepository {
    
    public static function find($id)
    {
        return TbSobreMim::find($id);
    }

    public static function tipoExperiencia()
    {
        return TbTipoExperiencia::whereIn('id', [1, 2, 3])->get();
    }

    public static function carreiraProfissionalAll()
    {
        return TbCarreiraProfissional::all();
    }

    public static function cursosComplementares()
    {
        return TbCarreiraProfissional::where('id_tipo_experiencia', '=', 4)
            ->orderBy('dt_inicio', 'DESC')
            ->get();
    }

    public static function tipoHabilidadeAll()
    {
        return  TbTipoHabilidade::all();
    }

    public static function habilidades()
    {
        return TbHabilidades::where('id', '>=', 1)
            ->orderBy('id_tipo_habilidade', 'ASC')
            ->orderBy('nr_ordenacao', 'ASC')
            ->get();
    }

    public static function portfolioAll()
    {
        return TbPortfolio::all();
    }

    public static function servicosAll()
    {
        return TbServicos::all();
    }

    public static function faleConoscoCreate($request)
    {
        try {
            DB::beginTransaction();
                $retornoFaleConosco = TbFaleConosco::create($request->all());
                $retornoLog = TbLogsSistema::create(['id_status' => 6, 'ds_log_executado' => "Fale Conosco"]);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }
}