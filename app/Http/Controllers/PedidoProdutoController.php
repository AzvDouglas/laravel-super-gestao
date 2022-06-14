<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        //$produtos = PedidoProduto::where('pedido_id', $pedido->id)->get();
        $produtos = Produto::all();
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        //Debug
        echo '<pre>';
        print_r($pedido);
        echo '</pre>';
        echo '<hr>';
        print_r($request->all());
        echo '<hr>';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        //
    }
}
