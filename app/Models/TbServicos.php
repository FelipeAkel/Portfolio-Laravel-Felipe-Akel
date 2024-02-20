<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbServicos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_servicos';
    protected $fillable = ['no_servico', 'ds_servico', 'ds_url_icon_svg', 'ds_url_img'];
}