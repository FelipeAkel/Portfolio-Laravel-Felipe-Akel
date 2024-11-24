<?php

    namespace App\Repositories\Habilidade;

    use App\Models\TbHabilidades;

    class HabilidadeRepository
    {
        public function all()
        {
            return TbHabilidades::all();
        }

        public function index($request)
        {
            $filtros = $request->only(['id_tipo_habilidade', 'nr_porcentagem', 'dt_created_inicio', 'dt_created_final']);
            
            $query = TbHabilidades::with('tipoHabilidade');
            
            if(!empty($filtros['id_tipo_habilidade'])) {
                $query->where('id_tipo_habilidade', '=', $filtros['id_tipo_habilidade']);
            }
            if(!empty($filtros['nr_porcentagem'])) {
                $query->where('nr_porcentagem', '=', $filtros['nr_porcentagem']);
            }
            if(!empty($filtros['dt_created_inicio'])) {
                $query->whereDate('created_at', '>=', $filtros['dt_created_inicio']);
            }
            if(!empty($filtros['dt_created_final'])) {
                $query->whereDate('created_at', '<=', $filtros['dt_created_final']);
            }
            
            $retornoHabilidade = $query
            ->orderBy('id_tipo_habilidade', 'ASC')
            ->orderBy('nr_ordenacao', 'ASC')
            ->paginate(10);

            return $retornoHabilidade;
        }

        public function store($request)
        {
            return TbHabilidades::create($request->all());
        }

        public function find($id)
        {
            return TbHabilidades::find($id);
        }

        public function update($id, $request)
        {
            $habilidade = TbHabilidades::find($id);
            return $habilidade->update($request->all());
        }

        public function destroy($id)
        {
            $habilidade = TbHabilidades::find($id);
            return $habilidade->delete();
        }

    }
?>