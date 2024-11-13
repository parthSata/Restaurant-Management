<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Optional, if you want to link it to a user
            $table->unsignedBigInteger('restaurant_id'); // Link to the restaurant
            $table->unsignedBigInteger('customer_id'); // Link to the customer
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->timestamps();
            
            // Add foreign keys if needed
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade'); // Foreign key for customer
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('delivery_addresses');
    }    

};
