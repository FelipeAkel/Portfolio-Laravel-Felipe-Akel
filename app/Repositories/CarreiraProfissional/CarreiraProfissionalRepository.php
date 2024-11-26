<?php

    namespace App\Repositories\CarreiraProfissional;

    use App\Models\TbCarreiraProfissional;

    class CarreiraProfissionalRepository
    {
        public function all()
        {
            return TbCarreiraProfissional::all();
        }

        public function index($request)
        {
            $filtros = $request->only(['no_experiencia', 'dt_inicio', 'dt_final', 'id_tipo_experiencia']);

            $query = TbCarreiraProfissional::with('tipoExperiencia');

            if(!empty($filtros['no_experiencia'])) {
                $query->where('no_experiencia', 'LIKE', '%' . $filtros['no_experiencia'] . '%');
            }
            if(!empty($filtros['dt_inicio'])) {
                $query->whereDate('dt_inicio', '>=', $filtros['dt_inicio']);
            }


            $retornoCarreiraProfissional = $query
                // ->toSql();
                ->paginate(10);

            // dd($request->all(), $filtros, $retornoCarreiraProfissional);
            // "no_experiencia" => "sdads sadsad"
            // "dt_inicio" => "2024-11-18"
            // "dt_final" => "2024-11-28"
            // "id_tipo_experiencia" => "3"

            return $retornoCarreiraProfissional;
        }

    }
?>