<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TechnicienFactory extends Factory
{
    public function definition(): array
    {
        $specialites = [
            'Mecanique generale',
            'Electricite automobile',
            'Carrosserie',
            'Climatisation',
            'Transmission',
            'Diagnostic electronique',
        ];

        return [
            'nom'       => $this->faker->lastName(),
            'prenom'    => $this->faker->firstName(),
            'specialite' => $this->faker->randomElement($specialites),
        ];
    }
}
