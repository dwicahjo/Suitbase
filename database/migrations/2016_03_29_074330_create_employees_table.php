<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('password', 255);
            $table->string('ktp_id', 100);
            $table->date('birth_date');
            $table->string('birth_place', 100);
            $table->integer('phone');
            $table->foreign('super_id')->references('id')->on('employees');
            $table->string('type', 100);
            $table->text('CV');
            $table->text('KK');
            $table->text('ijazah');
            $table->string('religion', 100);
            $table->string('gender', 6);
            $table->integer('overtime_hours');
            $table->integer('number_leave');
            $table->integer('last_avg_score');
            $table->string('address', 255);
            $table->text('NPWP');
            $table->foreign('departments_id')->references('id')->on('departments');
            $table->foreign('divisions_id')->references('id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
