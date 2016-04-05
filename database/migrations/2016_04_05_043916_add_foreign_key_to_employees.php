<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->integer('departments_id')->unsigned();
            $table->foreign('departments_id')->references('id')->on('departments')->onDelete('no action');
            $table->integer('divisions_id')->unsigned();
            $table->foreign('divisions_id')->references('id')->on('divisions')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_departments_id_foreign');
            $table->dropColumn('departments_id');
            $table->dropForeign('employees_divisions_id_foreign');
            $table->dropColumn('divisions_id');
        });
    }
}
