<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('add_on_items', function (Blueprint $table) {
        $table->unsignedBigInteger('restaurant_id')->nullable(); // Add foreign key column
        $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('add_on_items', function (Blueprint $table) {
        $table->dropForeign(['restaurant_id']);
        $table->dropColumn('restaurant_id');
    });
}
};
