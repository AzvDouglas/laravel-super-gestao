<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Motivo;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Motivo::create(['motivo'=>'Dúvida']);
        Motivo::create(['motivo'=>'Elogio']);
        Motivo::create(['motivo'=>'Reclamação']);
    }
}
