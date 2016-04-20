<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('surveys_form', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('divisions_id')->unsigned();
            $table->foreign('divisions_id')->references('id')->on('divisions');
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
        Schema::drop('surveys_form');
    }
}
