<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function getAboutUs()
    {
        return view('site.sobre-nos');
    }
}
