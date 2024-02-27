<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreMimController extends Controller
{
    public function visaoGeral()
    {
        return view('template-admin.sobre-mim.visao-geral');
    }

    public function informacaoPessoalShow() 
    {
        return view('template-admin.sobre-mim.informacao-pessoal-show');
    }

    public function informacaoPessoalEdit() 
    {
        return view('template-admin.sobre-mim.informacao-pessoal-edit');
    }

    public function mudarFoto()
    {
        return view('template-admin.sobre-mim.mudar-foto');
    }

    public function alterarLoginSenha()
    {
        return view('template-admin.sobre-mim.alterar-login-senha');
    }
}
