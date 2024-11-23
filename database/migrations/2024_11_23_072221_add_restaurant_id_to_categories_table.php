<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id');  // Add restaurant_id column
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');  // Add foreign key constraint
        });
    }
    
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);  // Drop foreign key
            $table->dropColumn('restaurant_id');  // Drop restaurant_id column
        });
    }
};
