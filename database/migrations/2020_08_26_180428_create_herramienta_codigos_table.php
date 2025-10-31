<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientaCodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramienta_codigos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('herramienta_id')->unsigned();
            $table->String('codigo');

            $table->String('caracteristicas',2000);
            $table->String('profesiones',2000);
            $table->String('motivacion',2000);
            $table->String('comunicacion',2000);
            $table->String('resolucion',2000);
            $table->String('decisiones',2000);
            $table->String('cuenta',2000);

            $table->enum('estado', ['ACTIVO', 'INACTIVO']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herramienta_codigos');
    }
}
