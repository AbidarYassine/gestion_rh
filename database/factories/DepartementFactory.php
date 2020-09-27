<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departement;
use Faker\Generator as Faker;

$factory->define(Departement::class, function (Faker $faker) {
    return [
        'nom_dep' => $faker->word,
    ];
});
