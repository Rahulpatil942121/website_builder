<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomaincreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaincreations', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name');
            $table->bigInteger('temp_id')->unsigned();
            $table->bigInteger('creater_id')->unsigned();
            $table->integer('role')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('temp_id')->references('id')->on('templatetbs');
            $table->foreign('creater_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domaincreations');
    }
}
