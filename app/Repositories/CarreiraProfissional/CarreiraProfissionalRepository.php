<?php

    namespace App\Repositories\CarreiraProfissional;

    use App\Models\TbCarreiraProfissional;
    use App\Models\TbLogsSistema;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\QueryException;
    use Exception;
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

        public function store($request)
        {
            try {
                DB::beginTransaction();
                    $retornoCarreira = TbCarreiraProfissional::create($request->all());                  
                    $retornoLog = TbLogsSistema::create(['id_status' => 6, 'ds_log_executado' => "Carreira Profissional"]);
                DB::commit();
                return true;
            } catch(Exception $e) {
                DB::rollback();
                return false;
            }
        }

        public function find($id)
        {
            return TbCarreiraProfissional::with("tipoExperiencia")->find($id);
        }

        public function update($request, $id)
        {
            try {
                DB::beginTransaction();
                    $retornoCarreira = TbCarreiraProfissional::find($id)->update($request->all());                    
                    $retornoLog = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => "Carreira Profissional - ID: $id"]);
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
                    $retornoCarreira = TbCarreiraProfissional::find($id)->delete();                    
                    $retornoLog = TbLogsSistema::create(['id_status' => 8, 'ds_log_executado' => "Carreira Profissional - ID: $id"]);
                DB::commit();
                return true;
            } catch(Exception $e) {
                DB::rollback();
                return false;
            }
        }

    }
?>