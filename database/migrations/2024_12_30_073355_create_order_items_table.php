<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id'); // Assuming there's an `items` table
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
    
};
