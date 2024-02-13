<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbTipoExperiencia extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'tb_tipo_experiencia';
    protected $fillable = ['no_tipo_experiencia', 'ds_tipo_experiencia'];

}
