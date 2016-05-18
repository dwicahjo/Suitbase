<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('answers_survey', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('surveys_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->text('answer');
            $table->foreign('surveys_id')->references('id')->on('surveys');
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
        Schema::drop('answers_survey');
    }
}
