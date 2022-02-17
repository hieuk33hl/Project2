<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LegalOff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_off', function (Blueprint $table) {
            $table->increments('id_legal');
            $table->string('reason');
            $table->date('strat_time_off');
            $table->date('end_time_off');
            $table->string('note');
            $table->string('approve')->default(null);
            $table->unsignedInteger('id_employee');
            $table->foreign('id_employee')->references('id_employee')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_off');
    }
}
