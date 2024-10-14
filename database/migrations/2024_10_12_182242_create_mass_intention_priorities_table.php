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
        Schema::create('mass_intention_priorities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mass_intention_id');

            $table->unsignedBigInteger('intention_type_id');

            $table->unsignedBigInteger('request_time_optioin_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mass_intention_priorities');
    }
};
