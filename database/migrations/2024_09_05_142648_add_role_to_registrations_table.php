<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Registrations', function (Blueprint $table) {
            $table->string('role')->default('customer')->after('password'); // Adding the 'role' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Registrations', function (Blueprint $table) {
            $table->dropColumn('role'); // Dropping the 'role' column if the migration is rolled back
        });
    }
}
