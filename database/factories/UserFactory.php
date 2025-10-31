<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'empresa_id' => 3,
        'slug' => Str::random(8),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'identificacion' => $faker->unique()->numerify('171#######'),
        'genero' => $faker->randomElement($array = array ('M','F')),
        'estado' => 'ACTIVO',
        'email_verified_at' => now(),
        'password' => Hash::make('Brainapp2020'),
        'jefe' =>   0,
        'test' =>   0,
        //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
