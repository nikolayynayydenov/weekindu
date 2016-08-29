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
            $table->foreign('host')->references('id')->on('users')->onDelete('cascade');
            $table->string('invitation_code')->unique();
            $table->string('title', 80);
            $table->string('dress_code', 80);
            $table->string('dress_code_image', 80);
            $table->string('location_x', 25);
            $table->string('location_y', 25);
            $table->string('location_string');
            $table->string('type', 80);
            $table->string('type_image', 80);
            $table->string('date');
            $table->string('background_photo');
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
