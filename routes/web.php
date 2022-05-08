<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FornecedorController;

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

Route::middleware('log.acesso')->
    get('/', [PrincipalController::class, 'getPrincipal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'getAboutUs'])->name('site.sobrenos');
Route::get('/contact', [ContactController::class, 'getContact'])->name('site.contato');
Route::post('/contact', [ContactController::class, 'salvar'])->name('site.contato.salvar');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login.autenticar');
//Route::get('/login', function () {return 'login';})->name('site.login');

Route::middleware(['autenticacao:ldap, visitante, p3, p4'])->prefix('/app')->group(function (){
    Route::get('/home',[HomeController::class, 'index'])->name('app.home');
    Route::get('sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/client', [ClientController::class, 'index'])->name('app.client');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::get('/product', [ProductController::class, 'index'])->name('app.product');
});

Route::get('/teste/{p1}/{p2}', [TestController::class, 'getTest'] )->name('teste');

Route::get('/rota2', function (){
    echo 'Rota 2';
    return redirect()->route('site.rota1');
})->name('site.rota2');

Route::fallback(function (){
    echo 'A rota que você digitou não existe.
    <a href=" '.route('site.index').'">Clique aqui</a> para volta à página inicial.';
});


