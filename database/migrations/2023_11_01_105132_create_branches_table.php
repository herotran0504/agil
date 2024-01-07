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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->boolean('is_main')->default(0);
            //merchant_id
            $table->foreignId('merchant_id')->nullable()->constrained('merchants')->onDelete('cascade');
            
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
        Schema::dropIfExists('branches');
    }
};
