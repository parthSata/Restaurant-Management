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
        Schema::table('menu_add_on_items', function (Blueprint $table) {
            $table->renameColumn('menu_id', 'menu_type_id'); 
            $table->dropForeign(['menu_id']); 
            $table->foreign('menu_type_id')->references('id')->on('menu_types')->onDelete('cascade'); // New foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_add_on_items', function (Blueprint $table) {
            // Revert column name back to menu_id
            $table->renameColumn('menu_type_id', 'menu_id');

            // Drop and recreate the foreign key to revert
            $table->dropForeign(['menu_type_id']);
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }
};
