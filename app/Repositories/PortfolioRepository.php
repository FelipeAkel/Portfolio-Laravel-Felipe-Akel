<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\TbPortfolio;
use App\Models\TbLogsSistema;

class PortfolioRepository
{
    public function index()
    {
        return TbPortfolio::where('id', '>=', 1)->paginate(10);
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