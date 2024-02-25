<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbPortfolio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_portfolio';
    protected $fillable = [
        'ds_tipo_projeto',
        'no_projeto', 
        'no_cliente', 
        'dt_inicio', 
        'dt_finalizacao', 
        'ds_url_projeto',
        'ds_url_repositorio',
        'ds_projeto',
        'ds_tecnologia',
    ];
}