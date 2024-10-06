<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Coupon Name
            $table->date('expiry_date'); // Expiry Date
            $table->enum('type', ['fixed', 'percentage']); // Coupon Type
            $table->decimal('discount', 8, 2); // Discount
            $table->enum('status', ['draft', 'publish']); // Status
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
        Schema::dropIfExists('coupons');
    }
};
