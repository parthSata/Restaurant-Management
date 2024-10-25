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
            $table->unsignedBigInteger('menu_id'); // Ensure this is unsigned
            $table->unsignedBigInteger('item_id'); // Ensure this is unsigned
            $table->timestamps();

            // Foreign keys
            $table->foreign('menu_id')->references('id')->on('menu_types')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('add_on_items')->onDelete('cascade');
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
