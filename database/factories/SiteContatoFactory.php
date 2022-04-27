<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;

/**
 * @extends Factory
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nome'              => $this->faker->name(),
            'email'             => $this->faker->unique()->email(),
            'telefone'          => $this->faker->phoneNumber(),
            'motivo'            => $this->faker->numberBetween(1,3),
            'mensagem'          => $this->faker->text(200)
        ];
    }
}
