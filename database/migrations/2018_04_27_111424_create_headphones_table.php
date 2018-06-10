<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headphones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark');
            $table->string('modell')->nullable();
            $table->string('color');
            $table->string('facilities');
            $table->string('capacity');
            $table->string('call');
            $table->string('timeWork');
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
        Schema::dropIfExists('headphones');
    }
}
