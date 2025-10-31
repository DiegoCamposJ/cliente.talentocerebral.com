<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionExesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_ex', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('herramienta_id')->unsigned();
            $table->string('slug')->unique();
            $table->integer('v1')->default(0);
            $table->integer('v2')->default(0);
            $table->integer('v3')->default(0);
            $table->integer('v4')->default(0);
            $table->integer('v5')->default(0);
            $table->integer('v6')->default(0);
            $table->integer('v7')->default(0);
            $table->integer('v8')->default(0);
            $table->integer('v9')->default(0);
            $table->integer('v10')->default(0);
            $table->integer('v11')->default(0);
            $table->integer('v12')->default(0);
            $table->enum('estado', ['PENDIENTE','PROCESO', 'FINALIZADA','ABANDONADA'])->default('PENDIENTE');
            $table->string('ruta')->nullable();
            $table->string('eva360')->default('NO');
            $table->dateTime('f_inicio')->nullable();
            $table->dateTime('f_fin')->nullable();
            $table->integer('tiempo')->default(0);
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
        Schema::dropIfExists('evaluaciones_ex');
    }
}
