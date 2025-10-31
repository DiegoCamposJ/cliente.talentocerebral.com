<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion')->unique();
            $table->string('slug')->unique();
            $table->integer('id_empresa')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('f_nacimiento')->nullable();
            //$table->char('sexo', 1)->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
