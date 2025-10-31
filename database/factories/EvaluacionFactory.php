<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evaluacion;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

$factory->define(Evaluacion::class, function (Faker $faker) {
    return [
        'persona_id' => $faker->numberBetween($min = 1, $max = 50),
        'herramienta_id' => 1,
        'v1' => $faker->numberBetween($min = 25, $max = 92),
        'v2' => $faker->numberBetween($min = 25, $max = 92),
        'v3' => $faker->numberBetween($min = 25, $max = 92),
        'v4' => $faker->numberBetween($min = 25, $max = 92),
        'v5' => $faker->numberBetween($min = 40, $max = 110),
        'v6' => $faker->numberBetween($min = 40, $max = 100),
        'v7' => $faker->numberBetween($min = 40, $max = 110),
        'v8' => $faker->numberBetween($min = 40, $max = 110),
        'estado' => 'PROCESO',
        'created_at' => Carbon::now()
        //'fecha_incio' => Carbon::now(),
        //'fecha_incio' => $faker->date($format = 'Y-m-d', $max = 'now') // '1979-06-09'
    ];
});



