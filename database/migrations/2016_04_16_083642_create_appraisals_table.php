<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('status');
            $table->integer('average_score');
            $table->text('comment');
            $table->integer('employees_id')->unsigned();
            $table->integer('divisions_id')->unsigned();
            $table->integer('appraisals_template_id')->unsigned();
            $table->integer('supervisors_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on('users');
            $table->foreign('divisions_id')->references('id')->on('divisions');
            $table->foreign('appraisals_template_id')->references('id')->on('appraisals_template');
            $table->foreign('supervisors_id')->references('supervisors_id')->on('supervisors');
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
        Schema::drop('appraisals');
    }
}
