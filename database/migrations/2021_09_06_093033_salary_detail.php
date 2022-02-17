<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalaryDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_detail', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->date('fromdate');
            $table->date('todate');
            $table->float('salary');
            $table->unsignedInteger('id_level');
            $table->unsignedInteger('id_jobTitle');
            $table->unsignedInteger('id_employee');
            $table->foreign('id_employee')->references('id_employee')->on('employees');
            $table->foreign('id_level')->references('id_level')->on('level');
            $table->foreign('id_jobTitle')->references('id_jobTitle')->on('jobTitle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_detail');
    }
}
