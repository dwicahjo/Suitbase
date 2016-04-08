<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ktp_id');
            $table->string('ktp_address');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('phone');
            $table->string('type');
            $table->text('CV');
            $table->text('KK');
            $table->text('ijazah');
            $table->string('religion');
            $table->string('gender');
            $table->integer('overtime_hours');
            $table->integer('number_leave');
            $table->integer('last_avg_score');
            $table->string('address');
            $table->text('NPWP');
            $table->text('KTP');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
