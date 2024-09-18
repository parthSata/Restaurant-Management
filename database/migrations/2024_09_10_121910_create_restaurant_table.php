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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name');
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('password');
            $table->string('service_type');
            $table->string('restaurant_type');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('feature_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
