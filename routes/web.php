<?php

use App\Http\Controllers\HabilidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreiraProfissionalCotroller;

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

Route::get('/', function () {
    return view('template-internauta.index');
})->name('internauta.index');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::prefix('admin')->group(function(){

    Route::get('/dashboard', function(){
        return view('template-admin.dashboard');
    })->name('admin.dashboard');

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
        });
    });

});
    

Route::get('/login', function(){
    return view('login');
})->name('login');