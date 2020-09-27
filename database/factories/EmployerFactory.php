<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employer;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

$factory->define(Employer::class, function (Faker $faker) {
    $year = rand(2009, 2016);
    $month = rand(1, 12);
    $day = rand(1, 28);
    $date = $date = Carbon::create($year, $month, $day, 0, 0, 0);
    return [
        'cin' => 'EE' . $faker->unique()->numberBetween(1001, 200000),
        'nom_employer' => $faker->lastName,
        'prenom' => $faker->firstName,
        'email' => $faker->unique(true)->safeEmail,
        'date_naissance' => $date->format('Y-m-d H:i:s'),
        'situationFami' => $faker->randomElement(['célibataire', 'marié', 'pacsé', 'divorcé ', 'séparé', 'veuf']),
        'sexe' =>  $faker->randomElement(["homme", "femme"]),
        'Num_cnss' => $faker->unique(true)->numberBetween(1001, 200000),
        'nbr_enfant' => $faker->randomElement(["0", "1", '2', '3']),
        'Num_Icmr' => $faker->unique(true)->numberBetween(17801, 20007400),
        'salaire' => $faker->numberBetween(4000, 10000),
        'image' => 'man.png',
        'emploi_id' => $faker->numberBetween(1, 10),
        'societe_id' => '1',
        'departement_id' => $faker->numberBetween(1, 4),
        'banque_id' => $faker->unique(true)->numberBetween(1, 50),
    ];
});
