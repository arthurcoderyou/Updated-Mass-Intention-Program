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
        Schema::create('request_time_options', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->integer('status')->default(0);
            // $table->enum('day',['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_time_options');
    }
};
