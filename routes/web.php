<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\HomeController;

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

Route::get('/login', [UsuarioController::class, 'exibeLogin'])->name('login');
Route::post('/tenta_login', [UsuarioController::class, 'tentaLogin']);

Route::middleware('auth')->group(function(){

	Route::middleware('eh_admin')->group(function(){
	Route::get('/usuario/novo', [UsuarioController::class, 'novo'])->name('usuario_novo');
	Route::post('/usuario/inserir', [UsuarioController::class, 'inserir'])->name('usuario_inserir');
	Route::get('/usuario/editar/{id}', [UsuarioController::class, 'editar'])->name('usuario_editar');
	Route::post('/usuario/alterar/{id}', [UsuarioController::class, 'alterar'])->name('usuario_alterar');
	Route::get('/usuario/excluir/{id}', [UsuarioController::class, 'excluir'])->name('usuario_excluir');

	Route::get('/categoria/novo', [CategoriasController::class, 'novo'])->name('categoria_novo');
	Route::post('/categoria/inserir', [CategoriasController::class, 'inserir'])->name('categoria_inserir');

});

Route::get('/usuario/lista', [UsuarioController::class, 'tela_principal'])->name('usuario_lista');
Route::get('/usuario/logout', [UsuarioController::class, 'logout'])->name('logout');

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'ecommerce'])->name('principal');
Route::get('/carrinho/pre-adicao/{produto}', [CarrinhoController::class, 'pre_adicao'])->name('adiciona_carrinho');
Route::post('/carrinho/adiciona', [CarrinhoController::class, 'finaliza_adicao'])->name('finaliza_adicao_carrinho');
Route::get('/carrinho', [CarrinhoController::class, 'visualiza'])->name('carrinho');
Route::get('/fecha_carrinho', [CarrinhoController::class, 'fecha_carrinho'])->name('fecha_carrinho');