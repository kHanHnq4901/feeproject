<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee', function (Blueprint $table) {
            $table->unsignedInteger('idMajor');
            $table->foreign('idMajor')->references('idMajor')->on('major');
            $table->unsignedInteger('idCourse');
            $table->foreign('idCourse')->references('idCourse')->on('course');
            $table->integer('fee');
            $table->primary(['idMajor', 'idCourse']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fee');
    }
}
