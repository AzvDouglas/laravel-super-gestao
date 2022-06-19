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
        //Eager loading:
        $pedido->produtos;  // equivalente a $produtos = $pedido->produtos;

        //$pedido->produtos()->sync([]);
        ///$pedido->load('produtos');
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
        //Validação
        $regras = [
            'produto_id' => 'required|exists:products,id'
        ];
        $feedback = [
            'produto_id.required' => 'O produto informado não existe'
        ];
        $request->validate($regras, $feedback);
/*
        //Criando relação pedido-produto
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
*/
        //Inserindo registros por relacionamento
        $pedido->produtos; //Carrega os regisros do relacionamento (tabela intermediaria/auxiliar) para o cache
        $pedido->produtos(); //Objeto que manipula o relacionamento
        $pedido->produtos()->attach(
            $request->get('produto_id'), //Produto a ser associado ao pedido
            ['quantidade' => $request->get('quantidade')]); //Array com colunas da tabela  auxiliar e valores
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
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
     * @param  \App\Models\PedidoProduto  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //PedidoProduto::where('pedido_id', $pedido->id)->where('produto_id', $produto->id)->delete();
/*
 *      Método convencional
        PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();
*/
        //Método Detach: delete pelo relacionamento
        //$pedido->produtos()->detach($produto->id);

        $pedidoProduto->delete();
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);

    }
}
