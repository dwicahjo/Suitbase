<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('status');
            $table->integer('employees_id')->unsigned();
            $table->integer('divisions_id')->unsigned();
            $table->integer('surveys_form_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on('users');
            $table->foreign('divisions_id')->references('id')->on('divisions');
            $table->foreign('surveys_form_id')->references('id')->on('surveys_form');
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
        Schema::drop('surveys');
    }
}
