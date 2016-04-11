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
            $table->string('password');
            $table->string('ktp_id', 100);
            $table->date('birth_date');
            $table->string('birth_place', 100);
            $table->integer('phone');
            $table->string('type', 100);
            $table->text('CV');
            $table->text('KK');
            $table->text('ijazah');
            $table->string('religion', 100);
            $table->string('gender', 6);
            $table->integer('overtime_hours');
            $table->integer('number_leave');
            $table->integer('last_avg_score');
            $table->string('address');
            $table->text('NPWP');
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
        Schema::drop('employees');
    }
}
