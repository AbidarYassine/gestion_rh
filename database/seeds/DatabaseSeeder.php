<?php

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
        factory(App\Banque::class, 50)->create();
        factory(App\Departement::class, 4)->create();
        factory(App\Emploi::class, 10)->create();
        factory(App\ContratType::class, 4)->create();
        factory(App\Contrat::class, 50)->create();
        factory(App\Employer::class, 50)->create();
    }
}
