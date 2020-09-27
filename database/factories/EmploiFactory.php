<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Emploi;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Emploi::class, function (Faker $faker) {
    $year = rand(2009, 2020);
    $month = rand(1, 12);
    $day = rand(1, 28);
    $date = $date = Carbon::create($year, $month, $day, 0, 0, 0);
    return [
        'fonction' => $faker->word,
        'date_debut' => $date->format('Y-m-d H:i:s'),
        'date_fin' =>  $date->format('Y-m-d H:i:s'),
        'descrip'=>$faker->text(),
        'salaire_base' => $faker->numberBetween(4000, 10000),
    ];
});
