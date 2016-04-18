<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_survey', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('question_type');
            $table->text('question');
            $table->integer('surveys_form_id')->unsigned();
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
        Schema::drop('questions_survey');
    }
}
