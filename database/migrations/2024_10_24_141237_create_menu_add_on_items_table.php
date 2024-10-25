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
        Schema::create('menu_add_on_items', function (Blueprint $table) {
            // Define the menu_id and add_on_item_id columns
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('add_on_item_id');

            // Foreign key constraints
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('add_on_item_id')->references('id')->on('add_on_items')->onDelete('cascade');

            // Add primary key for the pivot table
            $table->primary(['menu_id', 'add_on_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_add_on_items');
    }
};
