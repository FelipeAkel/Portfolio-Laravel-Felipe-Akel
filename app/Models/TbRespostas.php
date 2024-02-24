<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRespostas extends Model
{
    use HasFactory;

    protected $table = 'tb_respostas';
    protected $fillable = ['id_fale_conosco', 'st_notificacao_email', 'ds_resposta'];
}
