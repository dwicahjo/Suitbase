<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecapRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recap_request', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('department');
            $table->integer('total_leaves');
            $table->integer('total_remotes');
            $table->integer('total_trainings');
            $table->integer('total_procurements');
            $table->string('period');
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
        Schema::drop('requests');
    }
}
