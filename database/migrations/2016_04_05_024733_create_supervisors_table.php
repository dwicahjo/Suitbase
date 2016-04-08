<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supervisors_id')->unsigned();
            $table->foreign('supervisors_id')->references('id')->on('employees')->onDelete('no action');
            $table->integer('supervisees_id')->unsigned();
            $table->foreign('supervisees_id')->references('id')->on('employees')->onDelete('no action');
            $table->integer('gap_level');
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
        Schema::drop('supervisors');
    }
}
