<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome   = 'Fornecedor Cearense';
        $fornecedor->site   = 'fornecedorce.com.br';
        $fornecedor->uf     = 'CE';
        $fornecedor->email  = 'contato@fornecedor100.com';
        $fornecedor->save();

        //Método Create: Atenção ao atributo fillable da classe
        Fornecedor::create([
            'nome'  => 'Fornecedor Gaucho',
            'site'  => 'fornecedor-rs.com.br',
            'uf'    => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        //Método Insert
        DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor Carioca',
            'site'  => 'fornecedor-rj.com.br',
            'uf'    => 'RJ',
            'email' => 'contato@fornecedor300.com.br'
        ]);

    }
}
