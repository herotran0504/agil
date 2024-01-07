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
        Schema::table('debt_merchants', function (Blueprint $table) {
            //chenge to nullabl
            $table->string('payment_note')->nullable()->change();
            $table->string('payment_number')->nullable()->change();
            $table->string('payment_time')->nullable()->change();
            $table->string('payment_date')->nullable()->change();
            $table->string('payment_method')->nullable()->change();
            $table->string('details')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
