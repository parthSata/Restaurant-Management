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
            $table->id();
            $table->foreignId('menu_id')->constrained(); // Assuming you have a menus table
            $table->foreignId('item_id')->constrained('add_on_items'); // Assuming your items are in add_on_items table
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
        Schema::dropIfExists('added_items');
    }
};
