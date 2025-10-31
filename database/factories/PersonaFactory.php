<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persona;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;



$factory->define(Persona::class, function (Faker $faker) {
    return [
        'identificacion' => $faker->unique()->numerify('17########'),
        'slug' => Str::random(10),
        'id_empresa' => 1,
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'sexo' => $faker->randomElement($array = array ('M','F')),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'created_at' => Carbon::now(),
    ];
});
