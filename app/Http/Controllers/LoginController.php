<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Models\TbSobreMim;
use App\Models\TbLogsSistema;
use App\Repositories\SobreMimRepository;
use Brian2694\Toastr\Facades\Toastr;

use App\Services\SegurancaService;

class LoginController extends Controller
{
    protected $segurancaService;
    protected $sobreMimRepository;

    public function __construct(
        SegurancaService $segurancaService,
        SobreMimRepository $sobreMimRepository
    ){
        $this->segurancaService = $segurancaService;
        $this->sobreMimRepository = $sobreMimRepository;
    }
    
    public function login()
    {
        $sobreMim = $this->sobreMimRepository::find(1);
        return view('template-admin.login', compact('sobreMim'));
    }

    public function loginValidacao(LoginFormRequest $request)
    {
        $hashSenha = $this->segurancaService::criandoHashSenha($request['ds_senha']);
        $sobreMim = $this->sobreMimRepository::loginValidacao($request, $hashSenha);
        
        
        if(isset($sobreMim->no_usuario)){
            
            $dataUltimoAcesso = $this->dataUltimoAcesso();

            $retornoBanco = $this->sobreMimRepository::logSistemaLogin();

            if($retornoBanco == true){
                session_start();
                $_SESSION['no_usuario'] = $sobreMim->no_usuario;
                $_SESSION['no_usuario_portfolio'] = $sobreMim->no_usuario_portfolio;
                $_SESSION['no_login'] = $sobreMim->no_login;
                $_SESSION['ds_url_linkedin'] = $sobreMim->ds_url_linkedin;
                $_SESSION['ds_url_github'] = $sobreMim->ds_url_github;
                $_SESSION['ds_url_foto_usuario'] = $sobreMim->ds_url_foto_usuario;
                $_SESSION['dt_ultimo_acesso'] = $dataUltimoAcesso;

                return redirect()->route('admin.dashboard');

            } else {
                Toastr::error('Não foi possível registrar o log de acesso na tabela', 'Erro');
                return redirect()->route('admin.login');
            }

        } else {
            Toastr::warning('Usuário e/ou Senha inválidos!', 'Atenção');
            return redirect()->route('admin.login');
        }
        
    }

    public function dataUltimoAcesso()
    {
        $retornoBanco = $this->sobreMimRepository::dataUltimoAcesso();
        $dataUltimoAcesso = $retornoBanco === null 
            ? now()
            : $retornoBanco->created_at;
        return $dataUltimoAcesso;
    }

    public function logoff()
    {
        session_destroy();
        return redirect()->route('admin.login');
    }
}