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
    protected $fillable = ['id_tipo_habilidade', 'no_habilidade', 'ds_habilidade', 'nr_porcentagem', 'nr_ordenacao'];

    public function tipoHabilidade()
    {
        return $this->hasOne(TbTipoHabilidade::class, 'id', 'id_tipo_habilidade');
    }
}

