<?php 
namespace App\Repositories;

use App\Models\TbStatus;

class StatusRepository {
    
    public static function statusFaleConosco()
    {
        return TbStatus::find([1, 2, 3, 4, 5]);
    }

    public static function find($id)
    {
        return TbStatus::find($id);
    }

}