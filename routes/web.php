<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SobreMimController;
use App\Http\Controllers\HabilidadeController;
use App\Http\Controllers\InternautaController;
use App\Http\Controllers\CarreiraProfissionalCotroller;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\FaleConoscoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(InternautaController::class)->group(function () {
    Route::get('/', 'index')->name('internauta.index');
    Route::post('/contato/store', 'store')->name('internauta.contato.store');
});

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::prefix('admin')->group(function(){

    Route::get('/dashboard', function(){
        return view('template-admin.dashboard');
    })->name('admin.dashboard');

    Route::controller(SobreMimController::class)->group(function () {
        Route::prefix('sobre-mim')->group(function () {
            Route::get('/logs-sistema', 'logsSistema')->name('sobre-mim.logs-sistema');
            Route::get('/informacao-pessoal-show', 'informacaoPessoalShow')->name('sobre-mim.informacao-pessoal-show');
            Route::get('/informacao-pessoal-edit', 'informacaoPessoalEdit')->name('sobre-mim.informacao-pessoal-edit');
            // Route::put('/informacao-pessoal-edit', 'informacaoPessoalUpdate')->name('sobre-mim.informacao-pessoal-upddate');
            Route::get('/mudar-foto', 'mudarFoto')->name('sobre-mim.mudar-foto');
            // Route::put('/mudar-foto', 'mudarFotoUpdate')->name('sobre-mim.mudar-foto-update');
            Route::get('/alterar-login-senha', 'alterarLoginSenha')->name('sobre-mim.alterar-login-senha');
            // Route::put('/alterar-login-senha', 'alterarLoginSenhaUpdate')->name('sobre-mim.alterar-login-senha-update');

        });
    });

    Route::controller(CarreiraProfissionalCotroller::class)->group(function () {
        Route::prefix('carreira-profissional')->group(function(){
            Route::get('/index', 'index')->name('carreira-profissional.index');
            Route::get('/create', 'create')->name('carreira-profissional.create');
            Route::post('/store', 'store')->name('carreira-profissional.store');
            Route::get('/show/{id}', 'show')->where('id', '[0-9]+')->name('carreira-profissional.show');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('carreira-profissional.edit');
            Route::put('/update/{id}', 'update')->where('id', '[0-9]+')->name('carreira-profissional.update');
            Route::delete('/delete/{id}', 'destroy')->where('id', '[0-9]+')->name('carreira-profissional.delete');
        });
    });

    Route::controller(HabilidadeController::class)->group(function(){
        Route::prefix('habilidade')->group(function(){
            Route::get('/index', 'index')->name('habilidade.index');
            Route::get('/create', 'create')->name('habilidade.create');
            Route::post('/store', 'store')->name('habilidade.store');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('habilidade.edit');
            Route::put('/update/{id}', 'update')->where('id', '[0-9]+')->name('habilidade.update');
            Route::delete('/delete/{id}', 'destroy')->where('id', '[0-9]+')->name('habilidade.delete');
        });
    });

    Route::controller(PortfolioController::class)->group(function(){
        Route::prefix('portfolio')->group(function(){
            Route::get('/index', 'index')->name('portfolio.index');
            Route::get('/create', 'create')->name('portfolio.create');
            Route::post('/store', 'store')->name('portfolio.store');
            Route::get('/show/{id}', 'show')->where('id', '[0-9]+')->name('portfolio.show');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('portfolio.edit');
            Route::put('/update/{id}', 'update')->where('id', '[0-9]+')->name('portfolio.update');
            Route::delete('/delete/{id}', 'destroy')->where('id', '[0-9]+')->name('portfolio.delete');
        });
    });

    Route::controller(ServicosController::class)->group(function(){
        Route::prefix('servicos')->group(function(){
            Route::get('/index', 'index')->name('servicos.index');
            Route::get('/create', 'create')->name('servicos.create');
            Route::post('/store', 'store')->name('servicos.store');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('servicos.edit');
            Route::put('/update/{id}', 'update')->where('id', '[0-9]+')->name('servicos.update');
            Route::get('/show/{id}', 'show')->where('id', '[0-9]+')->name('servicos.show');
            Route::delete('/delete/{id}', 'destroy')->where('id', '[0-9]+')->name('servicos.delete');
        });
    });

    Route::controller(FaleConoscoController::class)->group(function(){
        Route::prefix('fale-conosco')->group(function(){
            Route::get('/index', 'index')->name('fale-conosco.index');
            Route::get('/show/{id}', 'show')->where('id', '[0-9]+')->name('fale-conosco.show');
            Route::get('/responder/{id}', 'responder')->where('id', '[0-9]+')->name('fale-conosco.responder');
            Route::post('/resposta-store/{id}', 'responderStore')->where('id', '[0-9]+')->name('fale-conosco.resposta-store');
        });
    });


});

