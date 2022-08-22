<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatetbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templatetbs', function (Blueprint $table) {
            $table->id();
            $table->string('temp_name');
            $table->string('folder_name');
            $table->bigInteger('temp_type')->unsigned();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('temp_type')->references('id')->on('temptypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templatetbs');
    }
}
