<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('order_id')->unique();
            $table->dateTime('order_date');
            $table->string('order_status'); // E.g., "Processing"
            $table->string('order_type'); // E.g., "Delivery", "Pickup"
            $table->string('payment_status'); // E.g., "Paid", "Unpaid"
            $table->unsignedBigInteger('restaurant_id'); // Foreign key for restaurant
            $table->timestamps(); // Created at & updated at

            // Foreign key constraint
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
