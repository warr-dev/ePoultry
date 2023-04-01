<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeatcriticalLightconfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('light_confs', function (Blueprint $table) {
            $table->decimal('critical_temperature')->default('25')->after('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('light_confs', function (Blueprint $table) {
            $table->dropColumn(['critical_temperature']);
        });
    }
}
