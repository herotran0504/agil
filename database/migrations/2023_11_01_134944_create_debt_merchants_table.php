<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_merchants', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');;
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('payment_date');
            $table->string('payment_time');
            $table->string('payment_number');
            $table->string('payment_note');
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->json('details');
            $table->string('refrence_id')->nullable();

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
        Schema::dropIfExists('debt_merchants');
    }
};
