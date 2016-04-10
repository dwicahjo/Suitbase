<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remotes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->date('date_start');
            $table->date('date_end');
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
        Schema::drop('remotes');
    }
}
