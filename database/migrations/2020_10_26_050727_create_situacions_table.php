<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateSituacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('herramienta_id')->unsigned();
            $table->integer('codigo')->default(0);
            $table->String('nombre',50);
            $table->String('descripcion',4000);
            $table->String('descripcion2',4000)->nullable();
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->String('usuario_registra',50)->nullable();
            $table->String('mensaje');
            $table->String('titulo')->nullable();
            $table->String('tipo')->nullable();
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
        Schema::dropIfExists('situaciones');
    }
}
