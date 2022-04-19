<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTest($p1, $p2) {
        //echo "Primeiro o parâmetro $p1 depois o parâmetro $p2";
        //return view('site.teste',['x'=>$p1, 'y'=>$p2]);
        //return view('site.teste', compact('p1','p2'));
        return view('site.teste')->with('p1', $p1)->with('p2', $p2);
    }
}
