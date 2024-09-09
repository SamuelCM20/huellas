<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('coordinates', function (Blueprint $table) {
            $table->id();
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('post_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('publications')->onDelete('cascade');

        });
    }

   
    public function down()
    {
        Schema::dropIfExists('coordinates');
    }
};
