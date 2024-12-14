<?php
namespace App\Repositories\FaleConosco;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;

use App\Models\TbRespostas;
use App\Models\TbFaleConosco;
use App\Models\TbLogsSistema;

class FaleConoscoRepository {
    
    public function index($request)
    {
        $filtros = $request->only(['id_status', 'dt_created_inicio', 'dt_created_final']);
        
        $query =  TbFaleConosco::with('status', 'respostas')->where('id', '>=', 1);
        if(!empty($filtros['id_status'])) {
            $query->where('id_status', '=', $filtros['id_status']);
        }
        if(!empty($filtros['dt_created_inicio'])) {
            $query->whereDate('created_at', '>=', $filtros['dt_created_inicio']);
        }
        if(!empty($filtros['dt_created_final'])) {
            $query->whereDate('created_at', '<=', $filtros['dt_created_final']);
        }
        $retornoFaleConosco = $query;

        return $retornoFaleConosco
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function find($id)
    {
        return TbFaleConosco::with('status')->find($id);
    }

    public function responderStore($id, $request)
    {
        $request['id_fale_conosco'] = $id;

        try {
            DB::beginTransaction();
                $retornoFaleConosco = TbFaleConosco::find($id)->update(['id_status' => $request['id_status']]);
                $retornoResposta = TbRespostas::create($request->all());
                $retornoLog = TbLogsSistema::create(['id_status' => 9, 'ds_log_executado' => "Fale Conosco - ID: $id"]);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }
    
}