<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandsfreesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handsfrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark');
            $table->string('modell')->nullable();
            $table->string('typeConnection');
            $table->string('color');
            $table->string('material');
            $table->string('warranty');
            $table->string('capacity');
            $table->string('timeBattery');
            $table->string('timeStanby');
            $table->string('distance');
            $table->string('image');
            $table->string('price');
            $table->string('explanation');
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
        Schema::dropIfExists('handsfrees');
    }
}
