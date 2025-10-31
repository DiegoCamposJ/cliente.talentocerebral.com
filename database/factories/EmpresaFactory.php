<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'ruc' => $faker->unique()->numerify('17########001'),
        'nombre' => $faker->company,
        'direccion' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'ciudad' => $faker->city,
        'representante' => $faker->name,
        'url' => $faker->unique()->url,
        'estado' => 'ACTIVO',
        'usuario_registra' => 'ADMIN',
        'created_at' => Carbon::now(),
    ];
});
