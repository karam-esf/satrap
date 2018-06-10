<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarchargerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carchargers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark');
            $table->string('modell')->nullable();
            $table->string('color');
            $table->string('inputVoltage');
            $table->string('port');
            $table->string('cable');
            $table->string('warranty');
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
        Schema::dropIfExists('carchargers');
    }
}
