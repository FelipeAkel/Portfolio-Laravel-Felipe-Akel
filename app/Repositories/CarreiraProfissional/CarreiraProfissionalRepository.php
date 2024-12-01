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
            if(!empty($filtros['dt_final'])) {
                $query->whereDate('dt_final', '<=', $filtros['dt_final']);
            }
            if(!empty($filtros['id_tipo_experiencia'])) {
                $query->where('id_tipo_experiencia', '=', $filtros['id_tipo_experiencia']);
            }
            
            $retornoCarreiraProfissional = $query
                ->paginate(10);

            return $retornoCarreiraProfissional;
        }

    }
?>