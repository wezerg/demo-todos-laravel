<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Appel des différent seeder (remplissage auto de la bdd)
        $this->call([
            PostSeeder::class
        ]);
    }
}
