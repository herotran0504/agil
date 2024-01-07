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
        Schema::create('o_t_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('otp')->nullable();
            $table->string('national_id');
            $table->string('phone')->nullable();
            $table->text('hash_session')->nullable();
            $table->timestamp('otp_expire_at')->nullable();
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
        Schema::dropIfExists('o_t_p_s');
    }
};
