<?php

    namespace App\Repositories\CarreiraProfissional;

    use App\Models\TbTipoExperiencia;

    class TipoExperienciaRepository
    {
        public function all()
        {
            return TbTipoExperiencia::all();
        }
    }
?>