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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->text('description');
            $table->foreignId('participant_id')->constrained('participants');
            $table->json('media_files');
            $table->string('short_description', 200);
            $table->string('registration_url')->nullable();
            $table->json('location');
            $table->json('schedule');
            $table->foreignId('activity_type_id')->constrained('activity_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
