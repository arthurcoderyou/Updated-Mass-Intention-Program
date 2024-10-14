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
        Schema::create('request_time_option_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id');
            $table->foreign('day_id')->references('id')->on('days')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('request_time_option_id');
            $table->foreign('request_time_option_id')->references('id')->on('request_time_options')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_time_option_days');
    }
};
