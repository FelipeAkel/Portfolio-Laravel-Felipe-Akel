<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbHabilidades extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'tb_habilidade';
    protected $fillable = ['no_habilidade', 'ds_habilidade', 'nr_porcentagem'];
}

