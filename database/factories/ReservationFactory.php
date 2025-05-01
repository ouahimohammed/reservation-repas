<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    public function definition()
    {
        return [
            'date_reservation' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'repas1' => $this->faker->boolean,
            'repas2' => $this->faker->boolean,
            'repas3' => $this->faker->boolean,
            'annulation' => $this->faker->boolean(20),
            'matricule' => function () {
                return \App\Models\Compte::inRandomOrder()->first()->matricule;
            },
        ];
    }
}