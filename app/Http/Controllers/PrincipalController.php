<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function getPrincipal() {

        $motivo = MotivoContato::all();
        //dd($motivo);
        return view('site.principal', ['motivo' => '$motivo']);
    }

}
