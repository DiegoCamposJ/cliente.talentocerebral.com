<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHerramientaToCampana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanas', function (Blueprint $table) {
            $table->bigInteger('herramienta_id')->default(0)->after('empresa_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campanas', function (Blueprint $table) {
            $table->dropColumn('herramienta_id');
        });
    }
}
