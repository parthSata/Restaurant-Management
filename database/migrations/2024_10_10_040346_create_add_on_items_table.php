<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
     public function up()
    {
        Schema::create('add_on_items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // For the item name
            $table->text('description')->nullable(); // For the item description
            $table->decimal('price', 8, 2); // For the item price
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->string('image')->nullable(); // For the image path
            $table->timestamps(); // For created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_on_items');
    }
};
