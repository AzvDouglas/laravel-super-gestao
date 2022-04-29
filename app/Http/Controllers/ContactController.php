<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContactController extends Controller
{
    public function getContact(Request $request)    {

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

        return view('site.contact');
    }

    public function salvar(Request $request) {
        //dd($request);
        //Validação dos dados do formolário recebidos pelo método request
        $request->validate([
            'nome'      => 'required|min:3|max:40',
            'telefone'  => 'required|',
            'email'     => 'required',
            'motivo'    => 'required',
            'mensagem'  => 'required|max:2000'
        ]);

        SiteContato::create($request->all());
    }
}
