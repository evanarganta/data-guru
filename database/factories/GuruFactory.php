<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'nip' => fake()->unique()->numerify('##########'),
            'mapel' => fake()->randomElement(['Pemrograman', 'Matematika', 'Bahasa Indonesia']),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
