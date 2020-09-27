<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contrat;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Contrat::class, function (Faker $faker) {
    $year = rand(2009, 2016);
    $month = rand(1, 12);
    $day = rand(1, 28);
    $date = $date = Carbon::create($year, $month, $day, 0, 0, 0);
    return [
        'employer_id' =>  $faker->unique()->numberBetween(1, 50),
        'date_embauche' => $date->format('Y-m-d H:i:s'),
        'contra_type_id' =>  $faker->unique(true)->numberBetween(1, 4),
    ];
});
