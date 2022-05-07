<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request) {

        $erro ='';
        if($request->get('erro')==1){
            $erro = 'Usuário ou Senha não existe';
        }

        if ($request->get('erro')==2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }
        return view('site.login',['erro'=>$erro]);
    }

    public function autenticar(Request $request) {
//Regras de Validação
        $regras = [
            'user'     => 'email',
            'password' => 'required'
        ];
        $feedback = [
            'user.email'         => 'Use seu email de acesso no campo Usuário',
            'password.required'  => 'O campo Senha deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        //Recuperando dados do formulário
        $email    = $request->get('user');
        $password = $request->get('password');
        //echo "Usuário: $email <br> Senha: $password    <br>";
        //print_r($request->all());

        //Iniciar o Model User
        $user = new User();
        //get() retorna a coleção e first() o primeiro item da coleção
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        if (isset($usuario->name)) {

            session_start();
            $_SESSION['nome']   = $usuario->name;
            $_SESSION['email']  = $usuario->email;
            //dd($_SESSION);
            return redirect()->route('app.clientes');
/*
            echo '<pre>';
            print_r($usuario);
            echo '</pre>';
*/
        } else {
            echo "<br>Usuário não existe";
            return redirect()->route('site.login',['erro'=> 1]);
        }

    }
}
