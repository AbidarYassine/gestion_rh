<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Banque;
use Faker\Generator as Faker;

$factory->define(Banque::class, function (Faker $faker) {
    return [
        'adresse' => $faker->address,
        'nom_banque' => $faker->word,
        'tele' => $faker->phoneNumber,
        'rib' => bcrypt("secret"),
    ];
});
