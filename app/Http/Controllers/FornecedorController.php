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
            ->paginate(3);

        //dd($fornecedores);
        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores, 'request'=>$request->all()]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validacao
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

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {

        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor'=>$fornecedor, 'msg'=>$msg]);
    }

    public function excluir($id) {

        Fornecedor::find($id)->delete(); //Soft Delete
        //Fornecedor::find($id)->forceDelete(); // Apagar de fato

        return redirect()->route('app.fornecedor');
    }

}
