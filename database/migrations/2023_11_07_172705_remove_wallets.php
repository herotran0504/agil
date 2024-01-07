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
        //remove wallet table
        //remove wallet id column from users table
        // Schema::table('users', function (Blueprint $table) {
        //     // $table->dropForeign('users_wallet_id_foreign');
        //     $table->dropColumn('wallet_id');
        // });
        //remove wallet id column from invoices table
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_wallet_id_foreign');
            $table->dropColumn('wallet_id');
        });
        //remove wallet id column from debt_users table
        Schema::table('debt_users', function (Blueprint $table) {
            $table->dropForeign('debt_users_wallet_id_foreign');
            $table->dropColumn('wallet_id');
        });
        Schema::dropIfExists('wallets');


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
