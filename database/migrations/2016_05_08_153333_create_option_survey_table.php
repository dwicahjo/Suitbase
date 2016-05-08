<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_survey', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('question_id')->unsigned();
            $table->integer('option');
            $table->foreign('question_id')->references('id')->on('questions_survey');
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
        Schema::drop('options_survey');
    }
}
