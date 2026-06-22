<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReparationFactory extends Factory
{
    public function definition(): array
    {
        $objets = [
            'Vidange moteur',
            'Changement de freins',
            'Remplacement de courroie de distribution',
            'Reparation du systeme de climatisation',
            'Diagnostic electronique',
            'Changement de pneus',
            'Reparation de boite de vitesses',
            'Remplacement de batterie',
            'Revision generale',
            'Reparation de carrosserie',
        ];

        return [
            'vehicule_id'       => Vehicule::factory(),
            'date'              => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'duree_main_oeuvre' => $this->faker->randomFloat(2, 0.5, 12),
            'objet_reparation'  => $this->faker->randomElement($objets),
        ];
    }
}
