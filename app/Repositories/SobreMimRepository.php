<?php 
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\TbSobreMim;
use App\Models\TbLogsSistema;

class SobreMimRepository {
    
    public function find($id)
    {
        return TbSobreMim::find($id);
    }

    public function logsSistema()
    {
        return TbLogsSistema::orderBy('created_at', 'DESC')->paginate(10);
    }

    public function informacaoPessoalUpdate($id, $request)
    {
        try {
            DB::beginTransaction();
                $sobreMim = TbSobreMim::find($id)->update($request->all());
                $logsSistema = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => 'Sobre Mim - Informação Pessoal']);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function updateCurriculoFoto($id, $updateArquivos)
    {
        try {
            DB::beginTransaction();
                $sobreMim = TbSobreMim::find($id)->update([
                    'ds_url_curriculo' => $updateArquivos['ds_url_curriculo'],
                    'ds_url_foto_usuario' => $updateArquivos['ds_url_foto_usuario']
                ]);
                $logsSistema = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => 'Sobre Mim - Arquivos PDF ou Foto']);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function alterarLoginSenhaUpdate($id, $request)
    {
        try {
            DB::beginTransaction();
                $sobreMim = TbSobreMim::find($id)->update($request->all());
                $logsSistema = TbLogsSistema::create(['id_status' => 7, 'ds_log_executado' => 'Sobre Mim - Login e Senha']);
            DB::commit();
            return true;
        } catch(Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function loginValidacao($request, $hashSenha)
    {
        return TbSobreMim::whereRaw('no_login = ? AND ds_senha = ? ', [$request['no_login'], $hashSenha])->first();
    }

    public function logSistemaLogin()
    {
        return TbLogsSistema::create(['id_status' => 10, 'ds_log_executado' => 'Login no sistema']);
    }

    public function dataUltimoAcesso()
    {
        return TbLogsSistema::where('id_status', '=', 10)->orderBy('id', 'DESC')->get()->first();
    }

}