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
        Schema::table('add_on_items', function (Blueprint $table) {
            // Drop the foreign key constraint first, if it exists
            $table->dropForeign(['menu_id']); // Adjust this if your foreign key has a different name
            $table->dropColumn('menu_id');
        });
    }
    

    public function down()
    {
        Schema::table('add_on_items', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->nullable(); // Add the original column back if needed
        });
    }
};
