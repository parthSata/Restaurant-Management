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
        Schema::create('added_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained(); // Foreign key to 'menus' table
            $table->foreignId('item_id')->constrained('add_on_items'); // Foreign key to 'add_on_items' table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('added_items');
    }
};
