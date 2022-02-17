<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id_employee');
            $table->string('name_empployee', '50');
            $table->date('dateOfBirth');
            $table->boolean('gender');
            $table->char('phoneNumber', '10');
            $table->string('address');
            $table->boolean('status');
            $table->string('email', '50');
            $table->string('password', '30');
            $table->float('salaryPerHour');
            $table->unsignedInteger('level');
            $table->foreign('level')->references('id_level')->on('level');
            $table->unsignedInteger('id_department');
            $table->foreign('id_department')->references('id_department')->on('departments');
            $table->unsignedInteger('id_jobTitle');
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
        Schema::dropIfExists('employees');
    }
}
