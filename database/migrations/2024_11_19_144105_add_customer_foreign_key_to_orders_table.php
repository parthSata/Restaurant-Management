<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Add the 'customer_id' column to the 'orders' table if it doesn't exist
        Schema::table('orders', function (Blueprint $table) {
            // Check if the 'customer_id' column already exists before adding it
            if (!Schema::hasColumn('orders', 'customer_id')) {
                $table->unsignedBigInteger('customer_id')->after('id'); // Make sure it is placed after the 'id' column
            }

            // Add foreign key constraint
            $table->foreign('customer_id')
                  ->references('id')->on('registrations')
                  ->onDelete('cascade'); // Optional: Delete associated orders when customer is deleted
        });
    }

    public function down()
    {
        // Drop the foreign key constraint and column if rolling back
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
};
