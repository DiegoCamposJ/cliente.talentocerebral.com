<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'empresa_id'=>1,
            'slug' => Str::random(8),
            'name'=>'admini BRAIN',
            'identificacion' => Str::random(10),
            'email'=>'admin@cerebro360.com',
            'estado' => 'ACTIVO',
            'genero' => 'M',
            'email_verified_at' => now(),
            'password' => Hash::make('Adminqpop835'),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
             ]);

        $usuario->assignRole('superadmin');


        $usuario = User::create([
            'empresa_id'=>2,
            'slug' => Str::random(8),
            'name'=>'admin BGR',
            'identificacion' => Str::random(10),
            'email'=>'bgr@app.com',
            'estado' => 'ACTIVO',
            'genero' => 'M',
            'email_verified_at' => now(),
            'password' => Hash::make('Adminqpop835'),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),

        ]);

        $usuario->assignRole('admin');

        // $usuario = User::create([
        //     'empresa_id'=>2,
        //     'slug' => Str::random(8),
        //     'name'=>'evaluado BGR',
        //     'identificacion' => Str::random(10),
        //     'email'=>'evaluado@app.com',
        //     'estado' => 'ACTIVO',
        //     'genero' => 'M',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('Adminqpop835'),
        //     //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at' => Carbon::now(),

        // ]);

        // $usuario->assignRole('evaluado');


        //factory(App\User::class,30)->create();


    }
}
