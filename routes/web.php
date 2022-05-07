<?php

use App\Http\Controllers\LoginController;
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
Route::post('/contact', [ContactController::class, 'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
//Route::get('/login', function () {return 'login';})->name('site.login');

Route::middleware(['autenticacao:ldap, visitante, p3, p4'])->prefix('/app')->group(function (){
    Route::get('/cliente', function (){return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produto', function (){return 'Produtos'; })->name('app.produtos');
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


