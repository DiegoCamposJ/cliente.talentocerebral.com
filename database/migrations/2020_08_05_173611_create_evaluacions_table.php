<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id')->unsigned();
            $table->bigInteger('herramienta_id')->unsigned();
            $table->integer('v1')->default(0);
            $table->integer('v2')->default(0);
            $table->integer('v3')->default(0);
            $table->integer('v4')->default(0);
            $table->integer('v5')->default(0);
            $table->integer('v6')->default(0);
            $table->integer('v7')->default(0);
            $table->integer('v8')->default(0);
            $table->enum('estado', ['PROCESO', 'FINALIZADA']);
            $table->string('ruta')->default('quadIntro');
            // $table->date('fecha_incio')->nullable();
            // $table->date('fecha_fin')->nullable();
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
        Schema::dropIfExists('evaluaciones');
    }
}
