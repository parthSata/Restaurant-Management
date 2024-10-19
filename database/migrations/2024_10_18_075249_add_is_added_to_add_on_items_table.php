<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('add_on_items', function (Blueprint $table) {
            // Add the 'is_added' column as a boolean or integer (according to your needs)
            $table->boolean('is_added')->default(false); // Or you can use ->default(1) if you want a default value of true
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_on_items', function (Blueprint $table) {
            // Drop the 'is_added' column if you need to rollback the migration
            $table->dropColumn('is_added');
        });
    }
};
