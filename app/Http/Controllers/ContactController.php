<?php

namespace App\Http\Controllers;

use App\Models\Motivo;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContactController extends Controller
{
    public function getContact(Request $request)    {

        $motivos = Motivo::all(); //Sem isso a tabela motivos não fica disponível na view contact

        //var_dump($_POST);
        /*  Objeto Request
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo  $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        /* Instanciando objeto contato
        $contato = new SiteContato();
        $contato->nome              = $request->input('nome');
        $contato->telefone          = $request->input('telefone');
        $contato->email             = $request->input('email');
        $contato->motivo            = $request->input('motivo');
        $contato->mensagem          = $request->input('mensagem');
        //print_r($contato->getAttributes());
        $contato->save();
        */

        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        print_r($contato->getAttributes());
        */

        return view('site.contact', ['motivos'=>$motivos]);
    }

    public function salvar(Request $request) {
        //dd($request);
        //Validação dos dados do formolário recebidos pelo método request
        $rules =         [
            'nome'          => 'required|min:3|max:40',
            'telefone'      => 'required|',
            'email'         => 'email',
            'motivos_id'    => 'required',
            'mensagem'      => 'required|max:2000'
        ];
        $feedback      =   [
            'nome.min'            => 'O nome precisa ter pelo menos 3 letras',
            'nome.max'            => 'O nome pode ter no máximo 40 caracteres',
            'email'               => 'Insira um email válido',
            'motivos_id.required' => 'Por favor, insira um motivo paro o contato',
            'mensagem.max'        => 'A mensagem não pode ter mais que 2000 caracteres',

            'required'            => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index'); //Criar uma view indicando para o usuário que o contato foi realizado com sucesso e chamá-la neste redirect
    }
}
