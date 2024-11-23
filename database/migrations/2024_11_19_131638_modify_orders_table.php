<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Adding new fields
            $table->decimal('subtotal', 10, 2)->nullable()->after('order_status');
            $table->decimal('delivery_fee', 10, 2)->nullable()->after('subtotal');
            $table->decimal('total', 10, 2)->nullable()->after('delivery_fee');
            $table->string('delivery_address')->nullable()->after('restaurant_id');

            // Adding customer_id field with foreign key
            $table->unsignedBigInteger('customer_id')->nullable()->after('id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Dropping foreign key and customer_id field
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');

            // Dropping added fields
            $table->dropColumn(['subtotal', 'delivery_fee', 'total', 'delivery_address']);
        });
    }
};
