<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('ALTER TABLE `restaurants` CHANGE `restaurant-name` `restaurant_name` VARCHAR(255)');
        DB::statement('ALTER TABLE `restaurants` CHANGE `restaurant-slug` `restaurant_slug` VARCHAR(255)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `restaurants` CHANGE `restaurant_name` `restaurant-name` VARCHAR(255)');
        DB::statement('ALTER TABLE `restaurants` CHANGE `restaurant_slug` `restaurant-slug` VARCHAR(255)');
    }
};
