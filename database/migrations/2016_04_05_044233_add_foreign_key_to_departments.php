<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->integer('companies_id')->unsigned();
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('no action');
            $table->integer('employees_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign('departments_companies_id_foreign');
            $table->dropColumn('companies_id');
            $table->dropForeign('departments_employees_id_foreign');
            $table->dropColumn('employees_id');
        });
    }
}
