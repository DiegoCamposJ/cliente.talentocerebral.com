<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleSeeder::class);
        // $this->call(EmpresaSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(HarramientaSeeder::class);

        //$this->call(PersonaSeeder::class);
        //$this->call(UserSeeder::class);
        //$this->call(EvaluacionSeeder::class);
        $this->call(VariableSeeder::class);

        // $this->call(VariablesBGRSeeder::class);
        // $this->call(SituacionSeeder::class);



    }
}
