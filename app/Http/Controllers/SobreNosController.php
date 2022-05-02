<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    /* Chamando um middleware através do controller
    public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
    }
    */

    public function getAboutUs()
    {
        return view('site.sobre-nos');
    }
}
