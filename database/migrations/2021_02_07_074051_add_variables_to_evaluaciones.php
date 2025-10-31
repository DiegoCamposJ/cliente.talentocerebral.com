<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVariablesToEvaluaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->integer('v9')->default(0)->after('v8');
            $table->integer('v10')->default(0)->after('v9');
            $table->integer('v11')->default(0)->after('v10');
            $table->integer('v12')->default(0)->after('v11');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->dropColumn('v9');
            $table->dropColumn('v10');
            $table->dropColumn('v11');
            $table->dropColumn('v12');
        });
    }
}
