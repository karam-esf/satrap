<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattriesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile');
            $table->string('mark')->nullable();
            $table->string('kind');
            $table->string('capacity');
            $table->string('warranty');
            $table->string('voltage');
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
        Schema::dropIfExists('battries');
    }
}
