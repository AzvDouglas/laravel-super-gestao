<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);
/*  Em vez desse foreach podemos estabelecer o relacionamento de 1 pra 1 através do Eloquente ORM
        foreach ($produtos as $key=>$produto) {

            $produtoDetalhe = ProdutoDetalhe::where('product_id', $produto->id)->first();

            if(isset($produtoDetalhe)) {

                $produtos[$key]['length'] = $produtoDetalhe->length;
                $produtos[$key]['width'] =  $produtoDetalhe->width;
                $produtos[$key]['height'] = $produtoDetalhe->height;
            }
        }
*/
        return view('app.produto.index', ['produtos'=>$produtos, $request->all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades'=>$unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:7|max:2000',
            'peso' => 'required',
            'unit_id' => 'exists:units,id'
        ];
        $feedback = [
            'required'=> 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter pelo menos :attribute.min caracteres',
            'max' => 'O campo :attribute deve ter menos que :attribute.min caracteres',
            'unit_id.exists' => 'Selecione uma unidade de medida válida'
        ];

        $request->validate($regras, $feedback);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //dd($produto);
        return view('app.produto.show', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto'=>$produto, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    /*
    //Payload/Carga útil: Parte dos dados transmitidos que é a mensagem real pretendida.
    print_r( $request->all() );
    echo '<br><br><br>';
    print_r( $produto->getAttributes() ); //Instância do objeto $produto no estado anterior
    */
    public function update(Request $request, Produto $produto)
    {
        //Método update passando o payload por parâmetro  para a instância do objeto $produto
        $produto->update($request->all());
        return redirect()->route('produto.show',['produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //dd($produto);
        $produto->delete();
        return redirect()->route('produto.index', ['produto'=>$produto->id]);
    }
}
