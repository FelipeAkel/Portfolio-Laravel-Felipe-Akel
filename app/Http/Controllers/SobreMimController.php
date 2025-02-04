<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InformacaoPessoalFormRequest;
use App\Http\Requests\ArquivosFormRequest;
use App\Http\Requests\LoginSenhaFormRequest;
use App\Services\SobreMimService;
use App\Services\SegurancaService;
use App\Repositories\DashboardRepository;
use App\Repositories\SobreMimRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function mudarArquivosShow()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();
        
        return view('template-admin.sobre-mim.mudar-arquivos-show', 
            compact('sobreMim'), $totalRegistros);
    }
        public function mudarArquivosEdit()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.mudar-arquivos-edit', 
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

        $retornoBanco = $this->sobreMimRepository::updateCurriculoFoto($id, $updateArquivos);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }
        return redirect()->route('sobre-mim.mudar-arquivos-show');
    }

    public function alterarLoginSenhaShow()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.alterar-login-senha-show', 
            compact('sobreMim'), $totalRegistros);
    }

    public function alterarLoginSenhaEdit()
    {
        $sobreMim = $this->sobreMimRepository::find(1); 
        $totalRegistros = $this->totalRegistros();

        return view('template-admin.sobre-mim.alterar-login-senha-edit', 
            compact('sobreMim'), $totalRegistros);
    }

    public function alterarLoginSenhaUpdate(LoginSenhaFormRequest $request, $id)
    {
        $sobreMim = $this->sobreMimRepository::find($id); 

        // Verificando se a senha antiga é igual
        $ds_senha_antiga = $this->segurancaService::criandoHashSenha($request['ds_senha_antiga']);
        if($ds_senha_antiga != $sobreMim->ds_senha){
            Toastr::warning('A Senha Antiga não corresponde ao que está cadastrado', 'Atenção');
            return redirect()->route('sobre-mim.alterar-login-senha-edit');
        }

        // Atribuindo o hash da senha nova
        $request['ds_senha']= $this->segurancaService::criandoHashSenha($request['ds_senha']);

        $retornoBanco = $this->sobreMimRepository::alterarLoginSenhaUpdate($id, $request);

        if($retornoBanco == true){
            Toastr::success('O registro foi atualizado', 'Sucesso');
        } else {
            Toastr::error('Não foi possível atualizado o registro', 'Erro');
        }

        return redirect()->route('sobre-mim.alterar-login-senha-show');
    }
}