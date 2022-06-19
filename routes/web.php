<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
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

    //Fornecedores
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id?}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id?}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    //Produtos
    //Route::get('/product', [ProductController::class, 'index'])->name('app.product'); //Sem --resource
    Route::resource('produto', ProdutoController::class); //Não é necessário setar nome nas rotas com o método resource
        // Os nomes são pré-definidos como 'nome da rota associado ao controlador'.'método do controlador' ->name('name.method')
    Route::resource('produto-detalhe', ProdutoDetalheController::class);

    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido', PedidoController::class);
    //Route::resource('pedido_produto', PedidoProdutoController::class);
    Route::get('/pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('/pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    //Route::get('/pedido-produto/edit/{pedido}/{produto}', [PedidoProdutoController::class, 'edit'])->name('pedido-produto.edit');
    //Route::post('/pedido-produto/update/{pedido}/{produto}', [PedidoProdutoController::class, 'update'])->name('pedido-produto.update');
    Route::delete('/pedido-produto/destroy/{pedidoProduto}/{pedido_id}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});


Route::fallback(function (){
    echo 'A rota que você digitou não existe.
    <a href=" '.route('site.index').'">Clique aqui</a> para volta à página inicial.';
});



Route::get('/teste/{p1}/{p2}', [TestController::class, 'getTest'] )->name('teste');

Route::get('/rota2', function (){
    echo 'Rota 2';
    return redirect()->route('site.rota1');
})->name('site.rota2');
