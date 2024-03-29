<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InformacaoPessoalFormRequest;
use App\Http\Requests\ArquivosFormRequest;
use App\Http\Requests\LoginSenhaFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\TbSobreMim;
use App\Models\TbLogsSistema;

use Brian2694\Toastr\Facades\Toastr;

class SobreMimController extends Controller
{
    public function logsSistema()
    {
        $infoSobreMim = $this->infoSobreMim();
        $totalCarreiraProfissional = $this->totalCarreiraProfissional();
        $totalHabilidade = $this->totalHabilidade();
        $totalPortfolio = $this->totalPortfolio();
        $totalServicos = $this->totalServicos();

        $logsSistema = TbLogsSistema::orderBy('created_at', 'DESC')->skip(0)->take(50)->paginate(10); // Recuperando 50 últimos logs
        
        return view('template-admin.sobre-mim.logs-sistema', compact(
            'infoSobreMim', 'totalCarreiraProfissional', 'totalHabilidade', 'totalPortfolio', 'totalServicos', 'logsSistema'
        ));
    }

    public function informacaoPessoalShow() 
    {
        $infoSobreMim = $this->infoSobreMim();
        $totalCarreiraProfissional = $this->totalCarreiraProfissional();
        $totalHabilidade = $this->totalHabilidade();
        $totalPortfolio = $this->totalPortfolio();
        $totalServicos = $this->totalServicos();

        $sobreMim = TbSobreMim::all()->first();

        return view('template-admin.sobre-mim.informacao-pessoal-show', compact(
            'infoSobreMim', 'totalCarreiraProfissional', 'totalHabilidade', 'totalPortfolio', 'totalServicos', 'sobreMim'
        ));
    }

    public function informacaoPessoalEdit() 
    {
        $infoSobreMim = $this->infoSobreMim();
        $totalCarreiraProfissional = $this->totalCarreiraProfissional();
        $totalHabilidade = $this->totalHabilidade();
        $totalPortfolio = $this->totalPortfolio();
        $totalServicos = $this->totalServicos();

        $sobreMim = TbSobreMim::all()->first();

        return view('template-admin.sobre-mim.informacao-pessoal-edit', compact(
            'infoSobreMim', 'totalCarreiraProfissional', 'totalHabilidade', 'totalPortfolio', 'totalServicos', 'sobreMim'
        ));
    }
    public function informacaoPessoalUpdate(InformacaoPessoalFormRequest $request, $id)
    {
        $sobreMim = TbSobreMim::find($id);
        $retornoBanco = $sobreMim->update($request->all());

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Sobre Mim - Informação Pessoal');

            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('sobre-mim.informacao-pessoal-show');
    }

    public function mudarArquivos()
    {
        $infoSobreMim = $this->infoSobreMim();
        $totalCarreiraProfissional = $this->totalCarreiraProfissional();
        $totalHabilidade = $this->totalHabilidade();
        $totalPortfolio = $this->totalPortfolio();
        $totalServicos = $this->totalServicos();

        $sobreMim = TbSobreMim::all()->first();

        return view('template-admin.sobre-mim.mudar-arquivos', compact(
            'infoSobreMim', 'totalCarreiraProfissional', 'totalHabilidade', 'totalPortfolio', 'totalServicos', 'sobreMim'
        ));
    }

    public function mudarArquivosUpdate(ArquivosFormRequest $request, $id)
    {
        $sobreMim = TbSobreMim::find($id);
        $urlCurriculo = $sobreMim->ds_url_curriculo;
        $urlFoto = $sobreMim->ds_url_foto_usuario;

//Verificando se arquivo foi adicionado
        if($request->file('ds_url_curriculo')){
// Lendo informações do arquivo selecionado
            $curriculo = $request->file('ds_url_curriculo');

// Armazenando o arquivo na pasta storage do Laravel. 
    // 1º parametro 'sobre-mim 'se refere a pasta criada/existente.
    // 2º parametro 'public' se refere ao arquivo de configuração Disk - config/filesystems.php o qual define o diretório configurado do Storage.
            $urlCurriculo = $curriculo->store('sobre-mim', 'public');

// Delete Arquivos Antigos ---- Adicionar na controller: use Illuminate\Support\Facades\Storage;
            Storage::disk('public')->delete($sobreMim->ds_url_curriculo);
        }

// Criando um link simbólico para a disco public. Dessa forma, será possível recuperar os arquivos pelo asset('public/storage/...') 
// prompt: php artisan storage:link

        if($request->file('ds_url_foto_usuario')){
            $foto = $request->file('ds_url_foto_usuario');
            $urlFoto = $foto->store('sobre-mim', 'public');
            Storage::disk('public')->delete($sobreMim->ds_url_foto_usuario);
        }

        $retornoBanco = $sobreMim->update([
            'ds_url_curriculo' => $urlCurriculo,
            'ds_url_foto_usuario' => $urlFoto,
        ]);

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Sobre Mim - Arquivos PDF ou Foto ');
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('sobre-mim.mudar-arquivos');
    }

    public function alterarLoginSenha()
    {
        $infoSobreMim = $this->infoSobreMim();
        $totalCarreiraProfissional = $this->totalCarreiraProfissional();
        $totalHabilidade = $this->totalHabilidade();
        $totalPortfolio = $this->totalPortfolio();
        $totalServicos = $this->totalServicos();
        
        $sobreMim = TbSobreMim::all()->first();

        return view('template-admin.sobre-mim.alterar-login-senha', compact(
            'infoSobreMim', 'totalCarreiraProfissional', 'totalHabilidade', 'totalPortfolio', 'totalServicos', 'sobreMim'
        ));
    }

    public function alterarLoginSenhaUpdate(LoginSenhaFormRequest $request, $id)
    {
        $sobreMim = TbSobreMim::find($id);

        // MELHORIA: Buscar melhorar o criandoHashSenha em um único arquivo. Atualmente está em LoginController e SobreMimController
        // Verificando se a senha antiga é igual
        $ds_senha_antiga = $this->criandoHashSenha($request['ds_senha_antiga']);
        if($ds_senha_antiga != $sobreMim->ds_senha){
            Toastr::warning('A Senha Antiga não corresponde ao que está cadastrado', 'Atenção');
            return redirect()->route('sobre-mim.alterar-login-senha');
        }

        // Atribuindo o hash da senha nova
        $request['ds_senha']= $this->criandoHashSenha($request['ds_senha']);

        $retornoBanco = $sobreMim->update($request->all());

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Sobre Mim - Login e Senha');

            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('sobre-mim.alterar-login-senha');
    }

    // MELHORIA: Buscar melhorar o criandoHashSenha em um único arquivo. Atualmente está em LoginController e SobreMimController
    public function criandoHashSenha ($variavel)
    {
        $md5 = 'P0rtf0l10Felipe@kel' . $variavel . '01_CriandoUmaHashMaisForte_10';
        return md5($md5);
    }

    public function infoSobreMim()
    {
        return TbSobreMim::all()->first();
    }

    public function totalCarreiraProfissional() 
    {
        return DB::select('SELECT COUNT(*) AS total_quantidade, CAR.id_tipo_experiencia, TIP.no_tipo_experiencia, TIP.ds_tipo_experiencia, TIP.deleted_at
                           FROM tb_carreira_profissional CAR
                           LEFT JOIN tb_tipo_experiencia TIP ON (TIP.id = CAR.id_tipo_experiencia)
                           WHERE TIP.deleted_at IS NULL
                           GROUP BY CAR.id_tipo_experiencia, TIP.no_tipo_experiencia, TIP.ds_tipo_experiencia, TIP.deleted_at');
    }

    public function totalHabilidade()
    {
        return DB::select('SELECT COUNT(HAB.id_tipo_habilidade) AS total_quantidade, HAB.id_tipo_habilidade, TIP.no_tipo_habilidade, TIP.ds_tipo_habilidade, TIP.deleted_at
                           FROM tb_habilidade HAB
                           LEFT JOIN tb_tipo_habilidade TIP ON (TIP.id = HAB.id_tipo_habilidade)
                           WHERE TIP.deleted_at IS NULL
                           GROUP BY HAB.id_tipo_habilidade, TIP.no_tipo_habilidade, TIP.ds_tipo_habilidade, TIP.deleted_at');
    }

    public function totalPortfolio()
    {
        $totalPortfolio = DB::select('SELECT COUNT(*) AS total_portfolio
                                      FROM tb_portfolio
                                      WHERE deleted_at IS NULL');
        return $totalPortfolio = $totalPortfolio[0];
    }

    public function totalServicos() 
    {
        $totalServicos = DB::select('SELECT COUNT(*) AS total_servicos
                                     FROM tb_servicos
                                     WHERE deleted_at IS NULL');
        return $totalServicos = $totalServicos[0];
    }
        
    public function logsSistemaStore ($id_status, $ds_log_executado)
    {
        return TbLogsSistema::create(['id_status' => $id_status, 'ds_log_executado' => $ds_log_executado]);
    }
}
