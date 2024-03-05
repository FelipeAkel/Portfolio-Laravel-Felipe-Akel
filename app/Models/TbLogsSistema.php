<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbLogsSistema extends Model
{
    use HasFactory;

    protected $table = 'tb_logs_sistema';

    protected $fillable = ['id_status', 'ds_log_executado'];

    public function status()
    {
        return $this->hasOne(TbStatus::class, 'id', 'id_status');
    }
}
