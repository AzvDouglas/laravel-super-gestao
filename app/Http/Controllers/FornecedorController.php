<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request) {

        $msg = '😥Ops ... ';
        //print_r($request->all()); //printa na tela um array com os parametros, incluindo o token csrf
        if($request->input('_token') != '') {   //verifica se o token não está vazio
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
            //echo 'Cadastrou o bagulho';
            $fornecedor =new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Fornecedor cadastrado com sucesso!';
        }

        return view('app.fornecedor.adicionar', ['msg'=>$msg]);
    }

}
