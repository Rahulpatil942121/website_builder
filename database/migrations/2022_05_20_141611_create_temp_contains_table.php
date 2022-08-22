<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempContainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_contains', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('temp_id')->unsigned();
            $table->bigInteger('conatin_id')->unsigned();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('temp_id')->references('id')->on('templatetbs');
            $table->foreign('conatin_id')->references('id')->on('containlists');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_contains');
    }
}
