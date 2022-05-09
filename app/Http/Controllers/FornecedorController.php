<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        //dd($request->all());
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site','like','%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();

        //dd($fornecedores);
        return view('app.fornecedor.listar', ['fornecedores'=> $fornecedores]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        //print_r($request->all()); //printa na tela um array com os parametros, incluindo o token csrf

        //Validação
        $regras = [
            'nome'  => 'required|min:3|max:40',
            'site'  => 'required',
            'uf'    => 'required|min:2|max:2',
            'email' => 'email'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo Nome deve ter no mínimo 3 carcteres',
            'nome.max' => 'O campo Nome deve ter no máximo 40 carcteres',
            'uf.required' => 'Digite a sigla de 2 carcteres correspondente ao seu estado',
            'uf.min' => 'Digite a sigla de 2 carcteres correspondente ao seu estado',
            'uf.max' => 'Digite a sigla de 2 carcteres correspondente ao seu estado',
            'email' => 'Insira um e-mail válido'
        ];
            $request->validate($regras, $feedback);

        //INCLUSÃO: Se o token está preenchido e se o id está vazio
        if($request->input('_token') != '' && $request->input('id') == '') {

            //echo 'Cadastrou o bagulho';
            $fornecedor =new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Fornecedor cadastrado com sucesso!';
        }

        //EDIÇÃO: Se o _token e o id estiverem preenchidos
        if($request->input('_token')!='' && $request->input('id')!='') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {   //Troço mal feito, refazer depois
                $msg = 'Fornecedor atualizado com sucesso! (talvez)';
            } else {
                $msg = 'Falha no update 😥 (ou não, sei lá xD)';
            }

            return redirect()->route('app.fornecedor.editar', ['msg'=>$msg, 'id'=>$request->input('id')]);

        }

        return view('app.fornecedor.adicionar', ['msg'=>$msg]);
    }

    public function editar($id, $msg = '') {

        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor'=>$fornecedor, 'msg'=>$msg]);
    }

}
