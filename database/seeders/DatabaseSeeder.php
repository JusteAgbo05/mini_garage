<?php

namespace Database\Seeders;

use App\Models\Reparation;
use App\Models\Technicien;
use App\Models\Vehicule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $vehicules = Vehicule::factory(15)->create();

        $techniciens = Technicien::factory(8)->create();

        $vehicules->each(function ($vehicule) use ($techniciens) {
            $reparations = Reparation::factory(rand(1, 4))->create([
                'vehicule_id' => $vehicule->id,
            ]);

            $reparations->each(function ($reparation) use ($techniciens) {
                $reparation->techniciens()->attach(
                    $techniciens->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
        });
    }
}
