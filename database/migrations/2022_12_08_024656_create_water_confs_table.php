<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterConfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_confs', function (Blueprint $table) {
            $table->id();
            $table->string('mode',20)->default('run');
            $table->decimal('maintankheight');
            // $table->decimal('dispensertankheight');
            $table->integer('maintankcritical')->default(30);
            $table->integer('waterer0')->default(0);
            $table->integer('waterer100')->default(500);
            $table->integer('waterercritical')->default(30);
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
        Schema::dropIfExists('water_confs');
    }
}
