<?php
namespace App\Repositories\FaleConosco;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;

use App\Models\TbRespostas;
use App\Models\TbFaleConosco;
use App\Models\TbLogsSistema;

class FaleConoscoRepository {
    
    public function index()
    {
        return TbFaleConosco::with('status', 'respostas')->where('id', '>=', 1)->orderBy('created_at', 'DESC')->paginate(10);
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