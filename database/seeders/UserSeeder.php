<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sg.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Douglas',
            'email' => 'douglas@sg.com',
            'password' => 'password',
        ]);
        //
        User::factory()->count(10)->create();
    }
}
