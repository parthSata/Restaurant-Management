<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Add the missing columns
            $table->string('transaction_id')->after('id');
            $table->string('payment_gateway')->after('transaction_id');
            $table->decimal('amount', 8, 2)->after('payment_gateway');
            $table->string('payment_status')->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the columns if needed
            $table->dropColumn('transaction_id');
            $table->dropColumn('payment_gateway');
            $table->dropColumn('amount');
            $table->dropColumn('payment_status');
        });
    }
};
