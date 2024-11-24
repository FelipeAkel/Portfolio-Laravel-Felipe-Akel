<?php

    namespace App\Repositories\Habilidade;

    use App\Models\TbTipoHabilidade;

    class TipoHabilidadeRepository
    {
        public function all()
        {
            return TbTipoHabilidade::all();
        }
    }
?>