<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bill", function (Blueprint $table) {
            $table->increments("idBill");

            $table->unsignedInteger('idStudent');
            $table->foreign('idStudent')->references('idStudent')->on('student');
            $table->unsignedInteger('idPaymentOption');
            $table->foreign('idPaymentOption')->references('idPaymentOption')->on('paymentOption');
            $table->integer('feeBill');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("bill");
    }
}
