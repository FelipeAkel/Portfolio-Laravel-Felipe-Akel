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

use App\Repositories\DashboardRepository;
use App\Repositories\SobreMimRepository;

use App\Services\SobreMimService;
use App\Services\SegurancaService;

use Brian2694\Toastr\Facades\Toastr;

class SobreMimController extends Controller
{
    protected $sobreMimRepository;
    protected $dashboardRepository;
    protected $sobreMimService;
    protected $segurancaService;

    public function __construct(
        DashboardRepository $dashboardRepository,
        SobreMimRepository $sobreMimRepository,
        SobreMimService $sobreMimService,
        SegurancaService $segurancaService
    ){
        $this->dashboardRepository = $dashboardRepository;
        $this->sobreMimRepository = $sobreMimRepository;
        $this->sobreMimService = $sobreMimService;
        $this->segurancaService = $segurancaService;
    }

            public function totalRegistros()
            {
                $totalCarreiraProfissional = $this->dashboardRepository::totalCarreiraProfissional();
                $totalHabilidade = $this->dashboardRepository::totalHabilidade();
                $totalPortfolio = $this->dashboardRepository::totalPortfolio();
                $totalServicos = $this->dashboardRepository::totalServicos();

                return [
                    'totalCarreiraProfissional' => $totalCarreiraProfissional,
                    'totalHabilidade' => $totalHabilidade,
                    'totalPortfolio' => $totalPortfolio,
                    'totalServicos' => $totalServicos,
                ];
            }

    public function logsSistema()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $logsSistema = $this->sobreMimRepository::logsSistema();
        $totalRegistros = $this->totalRegistros();
        
        return view('template-admin.sobre-mim.logs-sistema', 
            compact('sobreMim', 'logsSistema'), $totalRegistros);
    }

    public function informacaoPessoalShow() 
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.informacao-pessoal-show', 
            compact( 'sobreMim'), $totalRegistros);
    }

    public function informacaoPessoalEdit() 
    {        
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.informacao-pessoal-edit', 
            compact('sobreMim'), $totalRegistros);
    }
    public function informacaoPessoalUpdate(InformacaoPessoalFormRequest $request, $id)
    {
        $retornoBanco = $this->sobreMimRepository::informacaoPessoalUpdate($id, $request);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }
        return redirect()->route('sobre-mim.informacao-pessoal-show');
    }

    public function mudarArquivos()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.mudar-arquivos', 
            compact('sobreMim'), $totalRegistros);
    }

    public function mudarArquivosUpdate(ArquivosFormRequest $request, $id)
    {
        $sobreMim = $this->sobreMimRepository::find($id);
        
        // Salva e Deleta as arquivos na pasta public 
        $updateArquivos = $this->sobreMimService::updateArquivosPdfFoto($request, $sobreMim);
        
        if($updateArquivos['countDeletes'] > 0){
            Toastr::info("Total de ". $updateArquivos['countDeletes'] ." arquivos deletados", 'Informação');
        } 
        // TO DO - Encontrar outra solução mais eficiente para esta validação, por exemplo no FormRequest, pois ao iniciar o projeto não existirá arquivos na pasta e não vai conseguir fazer update
        // else {
        //     Toastr::error('Nenhum arquivo enviado! Envie um PDF ou Imagem', 'Erro');
        //     return redirect()->route('sobre-mim.mudar-arquivos');
        // }

        $retornoBanco = $this->sobreMimRepository::updateCurriculoFoto($id, $updateArquivos);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }
        return redirect()->route('sobre-mim.mudar-arquivos');
    }

    public function alterarLoginSenha()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.alterar-login-senha', 
            compact('sobreMim'), $totalRegistros);
    }

    public function alterarLoginSenhaUpdate(LoginSenhaFormRequest $request, $id)
    {
        $sobreMim = $this->sobreMimRepository::find($id); 

        // MELHORIA: Buscar melhorar o criandoHashSenha em um único arquivo. Atualmente está em LoginController e SobreMimController
        // Verificando se a senha antiga é igual
        $ds_senha_antiga = $this->segurancaService::criandoHashSenha($request['ds_senha_antiga']);

        if($ds_senha_antiga != $sobreMim->ds_senha){
            Toastr::warning('A Senha Antiga não corresponde ao que está cadastrado', 'Atenção');
            return redirect()->route('sobre-mim.alterar-login-senha');
        }

        // Atribuindo o hash da senha nova
        $request['ds_senha']= $this->segurancaService::criandoHashSenha($request['ds_senha']);

        $retornoBanco = $sobreMim->update($request->all());

        if($retornoBanco == true){
            $this->logsSistemaStore(7, 'Sobre Mim - Login e Senha');

            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('sobre-mim.alterar-login-senha');
    }

                            // public function infoSobreMim()
                            // {
                            //     return TbSobreMim::all()->first();
                            // }

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