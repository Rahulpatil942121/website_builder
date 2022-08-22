<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactusTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus_templates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('temp_id')->unsigned();
            $table->bigInteger('creater_id')->unsigned();
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_otherfields');             
            $table->text('contact_address');            
            $table->timestamps();

            $table->foreign('temp_id')->references('id')->on('templatetbs')->onDelete('cascade');
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
        Schema::dropIfExists('contactus_templates');
    }
}
