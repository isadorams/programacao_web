<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

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
    return view('welcome');
});

Route::get('/login', [UsuariosController::class, 'exibeLogin'])->name('login');
Route::post('/tenta_login', [UsuariosController::class, 'tentaLogin']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
	Route::get('/usuario/novo', [UsuariosController::class, 'novo'])->name('usuario_novo');
	Route::post('/usuario/inserir', [UsuariosController::class, 'inserir'])->name('usuario_inserir');
	Route::get('/usuario/editar/{id}', [UsuariosController::class, 'editar'])->name('usuario_editar');
	Route::post('/usuario/alterar/{id}', [UsuariosController::class, 'alterar'])->name('usuario_alterar');
	Route::get('/usuario/excluir/{id}', [UsuariosController::class, 'excluir'])->name('usuario_excluir');

});

Auth::routes();