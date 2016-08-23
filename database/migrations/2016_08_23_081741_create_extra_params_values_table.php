<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraParamsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_params_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('extra_param_id')->unsigned()->index();
            $table->foreign('extra_param_id')
                ->references('id')
                ->on('extra_params')
                ->onDelete('cascade');
            $table->string('value');
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
        Schema::drop('extra_params_values');
    }
}
