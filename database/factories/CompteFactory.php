<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompteFactory extends Factory
{
    public function definition()
    {
        return [
            'matricule' => (string) $this->faker->unique()->numberBetween(1000, 9999),
            'login' => $this->faker->unique()->userName,
            'motdepasse' => bcrypt('password'),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'photo' => null,
            'type_compte' => $this->faker->randomElement(['admin', 'personnel']),
        ];
    }
}