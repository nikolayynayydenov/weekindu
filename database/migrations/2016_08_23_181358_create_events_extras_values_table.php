<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsExtrasValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_extras_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->integer('extra_id')->unsigned()->index();
            $table->foreign('extra_id')
                ->references('id')
                ->on('extras')
                ->onDelete('cascade');

            $table->integer('value_id')->unsigned()->index();
            $table->foreign('value_id')
                ->references('id')
                ->on('values')
                ->onDelete('cascade');

            $table->integer('guest_id')->unsigned()->index();
            $table->foreign('guest_id')
                ->references('id')
                ->on('invitations')
                ->onDelete('cascade');
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
        Schema::drop('events_extras_values');
    }
}
