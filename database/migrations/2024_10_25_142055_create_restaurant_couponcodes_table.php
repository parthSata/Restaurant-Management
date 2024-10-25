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
        Schema::create('restaurant_couponcodes', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->enum('coupon_type', ['fixed', 'percentage']);
            $table->decimal('discount', 8, 2);
            $table->enum('coupon_option', ['Flat', 'Discount']);
            $table->decimal('min_order_amount', 10, 2);
            $table->date('expiry_date');
            $table->string('days_available');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurant_couponcodes');
    }
};
