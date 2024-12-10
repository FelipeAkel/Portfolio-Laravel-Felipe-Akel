<?php 
namespace App\Repositories\FaleConosco;

use App\Models\TbStatus;

class StatusRepository {
    
    public function statusFaleConosco()
    {
        return TbStatus::find([1, 2, 3, 4, 5]);
    }

    public function find($id)
    {
        return TbStatus::find($id);
    }

}