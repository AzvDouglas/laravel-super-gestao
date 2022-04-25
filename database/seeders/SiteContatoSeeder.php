<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contato = new SiteContato();
        $contato->nome              = 'Sistema';
        $contato->telefone          = '(27) 99568-6559';
        $contato->email             = 'contato@super.gestao.com';
        $contato->motivo_contato    = 1;
        $contato->mensagem          = 'Aqui o sistema é bruto!';
        $contato->save();
    }
}
