<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContratType;
use Faker\Generator as Faker;

$factory->define(ContratType::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['CDD', 'CDI', 'CTT', 'CUI ', 'CAE', 'CIE']),
    ];
});
