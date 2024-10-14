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
        Schema::create('mass_intention_request_time_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mass_intention_id');
            $table->foreign('mass_intention_id')->references('id')->on('mass_intentions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('time_option_id');
            $table->foreign('time_option_id')->references('id')->on('request_time_options')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mass_intention_request_time_options');
    }
};
