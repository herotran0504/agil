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
        Schema::table('merchant_admins', function (Blueprint $table) {
            $table->string('f_name_ar')->nullable();
            $table->string('l_name_ar')->nullable();
            $table->string('l_name_en')->nullable();
            $table->string('f_name_en')->nullable();
            $table->string('m_name_ar')->nullable();
            $table->string('m_name_en')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('role')->default('admin');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_admins', function (Blueprint $table) {
            //
        });
    }
};
