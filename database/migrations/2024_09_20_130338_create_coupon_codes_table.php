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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Coupon name
            $table->enum('type', ['percentage', 'fixed']); // Coupon type (Percentage or Fixed)
            $table->decimal('discount', 8, 2); // Discount value
            $table->date('expiry_date'); // Expiry date
            $table->enum('status', ['draft', 'publish']); // Status (Draft or Publish)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_codes');
    }
};
