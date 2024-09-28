<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant-name');
            $table->string('restaurant-slug')->unique();
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('contact_phone');
            $table->string('contact_email')->unique();
            $table->string('password');
            $table->text('about_us');
            $table->string('short_about');
            $table->string('service_type');
            $table->string('status');
            $table->string('currency');
            $table->string('restaurant_type');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('feature_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
