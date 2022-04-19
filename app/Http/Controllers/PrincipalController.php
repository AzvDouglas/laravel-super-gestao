<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function getPrincipal() {
        return view('site.principal');
    }

}
