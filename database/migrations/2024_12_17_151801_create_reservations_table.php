<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the table
            $table->integer('capacity'); // Seating capacity
            $table->string('image')->nullable(); // Path to the uploaded image
            $table->boolean('status')->default(0); // Active/Inactive status
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
