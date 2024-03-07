<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        session_start();
        // Verificando se o no_usuario existe e se não está vazio
        if(isset($_SESSION['no_usuario']) && $_SESSION['no_usuario'] != ''){
            return $next($request);
        } else {
            Toastr::error('Necessário realizar login para acessar o sistema!', 'Erro');
            return redirect()->route('admin.login');
        }
    }
}
