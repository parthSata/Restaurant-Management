<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('menu_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Menu name
            $table->unsignedBigInteger('parent_id')->nullable(); // Parent Menu (nullable)
            $table->string('image'); // Image URL
            $table->timestamps();

            // Foreign key constraint for the parent menu
            $table->foreign('parent_id')->references('id')->on('menu_types')->onDelete('cascade');
        });
    }
   
    public function down(): void
    {
        Schema::dropIfExists('menu_types');
    }
};
