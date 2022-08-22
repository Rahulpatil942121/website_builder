<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallerycontainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallerycontains', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('temp_id')->unsigned();
            $table->bigInteger('creater_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('apimage')->nullable();
            $table->string('image')->nullable();
            $table->string('apvideo')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();

            $table->foreign('temp_id')->references('id')->on('templatetbs');
            $table->foreign('creater_id')->references('id')->on('users');
            $table->foreign('section_id')->references('id')->on('containlists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallerycontains');
    }
}
