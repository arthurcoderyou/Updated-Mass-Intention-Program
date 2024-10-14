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
        Schema::create('mass_intentions', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name');
            $table->string('contact_info');
            $table->string('intention_name');
            $table->foreignId('intention_type');
            $table->foreign('intention_type')->references('id')->on('intention_types')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('intention_notes')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('duration');
            $table->enum('duration_type',['day','week','month','year']);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('mass_intentions');
    }
};
