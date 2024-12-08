<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;

use App\Models\TbServicos;
use App\Models\TbLogsSistema;

class ServicosRepository
{
    public function index()
    {
        return TbServicos::where('id', '>=', '1')->orderBy('no_servico', 'ASC')->paginate(10);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
                $retornoServicos = TbServicos::create($request->all());
                $retornoLog = TbLogsSistema::create(['id_status' => 6, 'ds_log_executado' => 'Serviço']);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function find($id)
    {
        return TbServicos::find($id);
    }

    public function update($id, $request)
    {
        try {
            DB::beginTransaction();
                $retornoServico = TbServicos::find($id)->update($request->all());
                $retornoLog = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => "Serviço - ID: $id"]);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
                $retornoServico = TbServicos::find($id)->delete();
                $retornoLog = TbLogsSistema::create(['id_status' => 8, 'ds_log_executado' => "Serviço - ID: $id"]);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }
}