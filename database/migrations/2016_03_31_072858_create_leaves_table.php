<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->date('date_start');
            $table->date('date_end');
            $table->string('type', 100);
            $table->text('description');
            $table->string('status', 100);
            $table->integer('employees_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on('users');
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
        Schema::drop('leaves');
    }
}
