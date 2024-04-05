<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRespostas extends Model
{
    use HasFactory;

    protected $table = 'tb_respostas';
    protected $fillable = ['id_fale_conosco', 'st_notificacao_email', 'ds_resposta'];

    public function faleConosco()
    {
        return $this->belongsTo(TbFaleConosco::class, 'id', 'id_fale_conosco');
    }
}
