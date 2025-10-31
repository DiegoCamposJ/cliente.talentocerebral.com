<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

use App\EvaluacionEx;
use Illuminate\Support\Carbon;


$factory->define(EvaluacionEx::class, function (Faker $faker) {
    return [
        'persona_id' => $faker->numberBetween($min = 1, $max = 50),
        'herramienta_id' => 3,
        'estado' => 'PENDIENTE',
        'created_at' => Carbon::now()
        //'fecha_incio' => Carbon::now(),
        //'fecha_incio' => $faker->date($format = 'Y-m-d', $max = 'now') // '1979-06-09'
    ];
});
