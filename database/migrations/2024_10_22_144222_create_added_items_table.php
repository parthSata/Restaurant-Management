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
        Schema::create('added_items', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');  // Foreign key to the menus table
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');  // Foreign key to the items table
            $table->timestamps();  // Automatically manages created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('added_items');
    }
};
