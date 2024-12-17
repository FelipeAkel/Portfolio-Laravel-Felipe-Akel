<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Models\TbSobreMim;
use App\Models\TbLogsSistema;
use Brian2694\Toastr\Facades\Toastr;

use App\Services\SegurancaService;

class LoginController extends Controller
{
    protected $segurancaService;

    public function __construct(
        SegurancaService $segurancaService
    ){
        $this->segurancaService = $segurancaService;
    }
    
    public function login()
    {
        $sobreMim = TbSobreMim::find(1);
        // dd($sobreMim);
        return view('template-admin.login', compact('sobreMim'));
    }

    public function loginValidacao(LoginFormRequest $request)
    {
        $hashSenha = $this->segurancaService::criandoHashSenha($request['ds_senha']);
        $sobreMim = TbSobreMim::whereRaw('no_login = ? AND ds_senha = ? ', [$request['no_login'], $hashSenha])->first();

        if(isset($sobreMim->no_usuario)){

            $retornoBanco = TbLogsSistema::create(['id_status' => 10, 'ds_log_executado' => 'Login no sistema']);
            if($retornoBanco == true){
                session_start();
                $_SESSION['no_usuario'] = $sobreMim->no_usuario;
                $_SESSION['no_usuario_portfolio'] = $sobreMim->no_usuario_portfolio;
                $_SESSION['no_login'] = $sobreMim->no_login;
                $_SESSION['ds_url_linkedin'] = $sobreMim->ds_url_linkedin;
                $_SESSION['ds_url_github'] = $sobreMim->ds_url_github;
                $_SESSION['ds_url_foto_usuario'] = $sobreMim->ds_url_foto_usuario;

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

    public function logoff()
    {
        session_destroy();
        return redirect()->route('admin.login');
    }
}