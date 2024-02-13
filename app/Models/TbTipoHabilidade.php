<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbTipoHabilidade extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'tb_tipo_habilidade';
    protected $fillable = ['no_tipo_habilidade', 'ds_tipo_habilidade'];
}
