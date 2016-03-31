<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->integer('integer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('overtimes');
    }
}
