<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FornecedorSeeder::class);
        $this->call(MotivoSeeder::class);
        $this->call(SiteContatoSeeder::class);
        //SiteContato::factory()->create();
    }
}
