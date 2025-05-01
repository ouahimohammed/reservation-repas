<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer un admin
        \App\Models\Compte::factory()->create([
            'matricule' => 'admin001',
            'login' => 'admin',
            'motdepasse' => bcrypt('admin123'),
            'nom' => 'Admin',
            'prenom' => 'System',
            'email' => 'admin@atlas-restaurant.com',
            'type_compte' => 'admin',
        ]);

        // Créer 20 comptes personnel
        \App\Models\Compte::factory(20)->create(['type_compte' => 'personnel']);

        // Créer 100 réservations
        \App\Models\Reservation::factory(100)->create();
    }
}