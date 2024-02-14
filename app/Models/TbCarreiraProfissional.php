<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbCarreiraProfissional extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'tb_carreira_profissional';
    protected $fillable = [
        'id_tipo_experiencia',
        'no_experiencia',
        'no_empresa',
        'dt_inicio',
        'dt_final',
        'ds_formacao',
        'nr_total_horas',
        'ds_url'
    ];
}
