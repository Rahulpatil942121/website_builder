<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusTepmlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutus_tepmlates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('temp_id')->unsigned();
            $table->bigInteger('creater_id')->unsigned();
            $table->string('heading');
            $table->text('about_description');
            $table->string('apimage');
            $table->string('image');
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
        Schema::dropIfExists('aboutus_tepmlates');
    }
}
