<?php

    namespace App\Repositories\Habilidade;

    use App\Models\TbHabilidades;
    use App\Models\TbLogsSistema;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\QueryException;
    use Exception;
    
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
            try {
                DB::beginTransaction();
                    $retornoHabilidades = TbHabilidades::create($request->all());
                    $retornoLog = TbLogsSistema::create(['id_status' => 6, 'ds_log_executado' => "Habilidade"]);
                DB::commit();
                return true;
            } catch(Exception $e) {
                DB::rollback();
                return false;
            }
        }

        public function find($id)
        {
            return TbHabilidades::find($id);
        }

        public function update($id, $request)
        {
            try {
                DB::beginTransaction();
                    $retornoHabilidade = TbHabilidades::find($id)->update($request->all());
                    $retornoLog = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => "Habilidade - ID: $id"]);
                DB::commit();
                return true;
            } catch(Exception $e) {
                DB::rollback();
                return false;
            }
        }

        public function destroy($id)
        {
            try {
                DB::beginTransaction();
                    $retornoHabilidades = TbHabilidades::find($id)->delete();                  
                    $retornoLog = TbLogsSistema::create(['id_status' => 8, 'ds_log_executado' => "Habilidade - ID: $id"]);
                DB::commit();
                return true;
            } catch(Exception $e) {
                DB::rollback();
                return false;
            }
        }

    }
?>