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
        Schema::table('restaurant_couponcodes', function (Blueprint $table) {
            // Change 'days_available' column to JSON type
            $table->json('days_available')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_couponcodes', function (Blueprint $table) {
            // Optionally, revert 'days_available' back to string if necessary
            $table->string('days_available')->change();
        });
    }
};
