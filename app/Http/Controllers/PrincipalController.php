<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motivo;

class PrincipalController extends Controller
{
    public function getPrincipal() {

        $motivos = Motivo::all();
        //dd($motivos);
        return view('site.principal', ['motivos' => $motivos]);
    }

}
