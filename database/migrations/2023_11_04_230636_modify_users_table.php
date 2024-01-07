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
        Schema::table('users', function (Blueprint $table) {
            // Make the 'email' field nullable
            $table->string('email')->nullable()->change();

            // Add unique constraint to 'national_id' and 'phone' fields
            $table->unique('national_id');
            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse the changes if needed
            $table->string('email')->nullable(false)->change();
            $table->dropUnique('users_national_id_unique');
            $table->dropUnique('users_phone_unique');
        });
    }
};
