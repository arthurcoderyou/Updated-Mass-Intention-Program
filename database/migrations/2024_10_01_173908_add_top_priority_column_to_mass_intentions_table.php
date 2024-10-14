<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mass_intentions', function (Blueprint $table) {
            $table->unsignedBigInteger('priority')->after('id')->nullable(); // Adds the module column after the name column

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mass_intentions', function (Blueprint $table) {
            $table->dropColumn('priority'); // Removes the module column
        });
    }
};
