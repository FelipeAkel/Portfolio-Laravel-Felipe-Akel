<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TbFaleConosco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_fale_conosco';

    protected $fillable = ['id_status', 'no_contato', 'ds_email', 'ds_assunto', 'ds_mensagem'];

    public function status()
    {
        return $this->hasOne(TbStatus::class, 'id', 'id_status');
    }
}
