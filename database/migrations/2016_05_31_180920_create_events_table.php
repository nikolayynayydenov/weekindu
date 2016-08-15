<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host')->unsigned()->index();
            $table->foreign('host')->references('id')->on('users');
            $table->string('invitation_code')->unique();
            $table->string('title', 80);
            $table->string('dress_code', 80);
            $table->string('location_coordinates', 50);
            $table->string('location_string');
            $table->string('type', 80);
            $table->string('date');
            $table->string('music');
            $table->string('food');
            $table->string('drinks');
            $table->text('extras');            
            $table->text('description');
            $table->boolean('is_public');
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
        Schema::drop('events');
    }
}
