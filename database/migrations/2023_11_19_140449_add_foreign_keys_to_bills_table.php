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
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign(['payment_id'])->references(['id'])->on('payments');
            $table->foreign(['user_id'])->references(['id'])->on('users');
            $table->foreign(['shipment_id'])->references(['id'])->on('shipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign('bills_payment_id_foreign');
            $table->dropForeign('bills_user_id_foreign');
            $table->dropForeign('bills_shipment_id_foreign');
        });
    }
};
