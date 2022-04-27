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

        //Também preenche o array
        $contato = new SiteContato();
        $contato->fill($request->all());

        print_r($contato->getAttributes());

        return view('site.contact');
    }
}
