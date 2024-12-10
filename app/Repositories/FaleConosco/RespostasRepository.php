<?php 
namespace App\Repositories\FaleConosco;

use App\Models\TbRespostas;

class RespostasRepository {

    public function faleConosco($id)
    {
        return TbRespostas::where('id_fale_conosco', '=', $id)->orderBy('created_at', 'DESC')->paginate(5);
    }

}