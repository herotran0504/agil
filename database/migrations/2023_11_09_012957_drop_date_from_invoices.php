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
        Schema::table('invoices', function (Blueprint $table) {
            //chenge to nullabl
            $table->string('invoice_number')->nullable()->change();
            $table->string('invoice_type')->nullable()->change();
            $table->string('invoice_status')->nullable()->change();
            $table->string('invoice_date')->nullable()->change();
            $table->string('invoice_time')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
  
            
        });
    }
};
