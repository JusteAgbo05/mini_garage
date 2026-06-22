<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    public function definition(): array
    {
        $marques = ['Renault', 'Peugeot', 'Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes', 'Volkswagen'];
        $modeles = ['Clio', '208', 'Corolla', 'Civic', 'Focus', 'Serie 3', 'Classe C', 'Golf'];
        $carrosseries = ['Berline', 'SUV', 'Break', 'Coupe', 'Monospace', 'Cabriolet'];
        $energies = ['Essence', 'Diesel', 'Hybride', 'Electrique'];
        $boites = ['Manuelle', 'Automatique'];
        $couleurs = ['Blanc', 'Noir', 'Gris', 'Rouge', 'Bleu', 'Vert', 'Beige'];

        $index = $this->faker->numberBetween(0, 7);

        return [
            'immatriculation' => strtoupper($this->faker->bothify('??-###-??')),
            'marque'          => $marques[$index],
            'modele'          => $modeles[$index],
            'couleur'         => $this->faker->randomElement($couleurs),
            'annee'           => $this->faker->numberBetween(2005, 2023),
            'kilometrage'     => $this->faker->numberBetween(5000, 250000),
            'carrosserie'     => $this->faker->randomElement($carrosseries),
            'energie'         => $this->faker->randomElement($energies),
            'boite'           => $this->faker->randomElement($boites),
        ];
    }
}
