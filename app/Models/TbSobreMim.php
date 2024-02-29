<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbSobreMim extends Model
{
    use HasFactory;

    protected $table = 'tb_sobre_mim';

    protected $fillable = ['no_usuario', 'no_usuario_portfolio', 'ds_email', 'ds_telefone', 'ds_cidade_uf', 'ds_funcao', 'ds_subtitulo', 'ds_perfil', 'ds_url_linkedin', 'ds_url_github', 'no_login', 'ds_senha'];
}
