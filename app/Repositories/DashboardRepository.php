<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class DashboardRepository {

    public function totalCarreiraProfissional() 
    {
        return DB::select(
            'SELECT COUNT(*) AS total_quantidade, CAR.id_tipo_experiencia, TIP.no_tipo_experiencia, TIP.ds_tipo_experiencia, TIP.deleted_at
            FROM tb_carreira_profissional CAR
            LEFT JOIN tb_tipo_experiencia TIP ON (TIP.id = CAR.id_tipo_experiencia)
            WHERE TIP.deleted_at IS NULL
            GROUP BY CAR.id_tipo_experiencia, TIP.no_tipo_experiencia, TIP.ds_tipo_experiencia, TIP.deleted_at'
        );
    }

    public function totalHabilidade()
    {
        return DB::select(
            'SELECT COUNT(HAB.id_tipo_habilidade) AS total_quantidade, HAB.id_tipo_habilidade, TIP.no_tipo_habilidade, TIP.ds_tipo_habilidade, TIP.deleted_at
            FROM tb_habilidade HAB
            LEFT JOIN tb_tipo_habilidade TIP ON (TIP.id = HAB.id_tipo_habilidade)
            WHERE TIP.deleted_at IS NULL
            GROUP BY HAB.id_tipo_habilidade, TIP.no_tipo_habilidade, TIP.ds_tipo_habilidade, TIP.deleted_at'
        );
    }

    public function totalPortfolio()
    {
        $totalPortfolio = DB::select(
            'SELECT COUNT(*) AS total_portfolio
            FROM tb_portfolio
            WHERE deleted_at IS NULL'
        );
        return $totalPortfolio = $totalPortfolio[0];
    }

    public function totalServicos() 
    {
        $totalServicos = DB::select(
            'SELECT COUNT(*) AS total_servicos
            FROM tb_servicos
            WHERE deleted_at IS NULL'
        );
        return $totalServicos = $totalServicos[0];
    }

    public function totalFaleConosco()
    {
        return DB::select(
            "SELECT COUNT(FAL.id_status) AS 'total_status', FAL.id_status, STA.no_status, STA.ds_status
            FROM tb_fale_conosco FAL
            INNER JOIN tb_status STA ON (STA.id = FAL.id_status)
            GROUP BY FAL.id_status, STA.no_status, STA.ds_status"
        );
    }

}