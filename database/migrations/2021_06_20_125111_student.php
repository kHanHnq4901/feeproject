<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema thư viện laravel hỗ trợ hành động của bảng
        // Blue là thư viện hỗ trợ tạo cột
        Schema::create('student', function (Blueprint $table) {
            # $table->id();// id tự tăng và có kiểu dữ liệu big int primary key
            $table->increments('idStudent'); #tự tăng kiểu dữ liệu int primary key
            $table->string('nameStudent', 100); #varchar
            $table->boolean('gender');
            $table->date('dateBirth');
            $table->string('address', 255); #varchar
            $table->string('email', 50); #varchar
            $table->string("password", 30);
            $table->unsignedInteger('idGrade');
            $table->foreign('idGrade')->references('idGrade')->on('Grade');
            $table->unsignedInteger('idPaymentOption');
            $table->foreign('idPaymentOption')->references('idPaymentOption')->on('paymentoption');
            $table->unsignedInteger('idScholarship');
            $table->foreign('idScholarship')->references('idScholarship')->on('scholarship');
            $table->integer('debtfees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student');
    }
}
