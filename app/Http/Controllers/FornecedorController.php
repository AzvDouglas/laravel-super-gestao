<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor');
    }
    /*
    public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'CNPJ' => '000.000.000/00',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1=>[
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'CNPJ' => null,
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            2=>[
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'CNPJ' => null,
                'ddd' => '32',
                'telefone' => '0000-0000'
            ]
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
    */
}
