<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\TbPortfolio;
use App\Models\TbLogsSistema;

class PortfolioRepository
{
    public function index($request)
    {
        $query = TbPortfolio::where('id', '>', 0);

        if(!empty($request['tipo_php_laravel'])) {
            $query->where('ds_tipo_projeto', 'like', '%' . $request->tipo_php_laravel . '%');
        }
        if(!empty($request['tipo_website'])) {
            $query->where('ds_tipo_projeto', 'like', '%' . $request->tipo_website . '%');
        }
        if(!empty($request['tipo_landing_page'])) {
            $query->where('ds_tipo_projeto', 'like', '%' . $request->tipo_landing_page . '%');
        }
        if(!empty($request['tipo_angular'])) {
            $query->where('ds_tipo_projeto', 'like', '%' . $request->tipo_angular . '%');
        }

        if(!empty($request['no_projeto'])) {
            $query->where('no_projeto', 'like', '%' . $request->no_projeto . '%');
        }

        if(!empty($request['ds_tecnologia'])) {
            $query->where('ds_tecnologia', 'like', '%' . $request->ds_tecnologia . '%');
        }

        if(!empty($request['dt_inicio_inicio'])) {
            $dtInicio = \Carbon\Carbon::createFromFormat('Y-m-d', $request['dt_inicio_inicio'])->format('Y-m-d');
            $query->where('dt_inicio', '>=', $dtInicio);
        }
        if(!empty($request['dt_inicio_final'])) {
            $dtFinal = \Carbon\Carbon::createFromFormat('Y-m-d', $request['dt_inicio_final'])->format('Y-m-d');
            $query->where('dt_inicio', '<=', $dtFinal);
        }

        if(!empty($request['dt_finalizacao_inicio'])) {
            $dtInicio = \Carbon\Carbon::createFromFormat('Y-m-d', $request['dt_finalizacao_inicio'])->format('Y-m-d');
            $query->where('dt_finalizacao', '>=', $dtInicio);
        }
        if(!empty($request['dt_finalizacao_final'])) {
            $dtFinal = \Carbon\Carbon::createFromFormat('Y-m-d', $request['dt_finalizacao_final'])->format('Y-m-d');
            $query->where('dt_finalizacao', '<=', $dtFinal);
        }

        $retornoPortfolio = $query
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $retornoPortfolio;
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
                $retornoPortfolio = TbPortfolio::create($request->all());
                $retornoLog = TbLogsSistema::create(['id_status' => 6, 'ds_log_executado' => "Portfólio: Projeto"]);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function find($id)
    {
        return TbPortfolio::find($id);
    }

    public function update($id, $request)
    {
        try {
            DB::beginTransaction();
                $retornoPortfolio = TbPortfolio::find($id)->update($request->all());
                $retornoLog = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => "Portfólio: Projeto - ID: $id"]);
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
                $retornoPortfolio = TbPortfolio::find($id)->delete();
                $retornoLog = TbLogsSistema::create(['id_status' => 8, 'ds_log_executado' => "Portfólio: Projeto - ID: $id"]);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }
}