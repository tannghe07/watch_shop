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
        Schema::table('bill_details', function (Blueprint $table) {
            $table->foreign(['product_id'])->references(['id'])->on('products');
            $table->foreign(['bill_id'])->references(['id'])->on('bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            $table->dropForeign('bill_details_product_id_foreign');
            $table->dropForeign('bill_details_bill_id_foreign');
        });
    }
};
