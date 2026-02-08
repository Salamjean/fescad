<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('festival_visions', function (Blueprint $table) {
            $table->id();

            // Vision
            $table->string('vision_title')->default('Notre Vision');
            $table->text('vision_text');
            $table->string('vision_image')->nullable();

            // Mission
            $table->string('mission_title')->default('Notre Mission');
            $table->text('mission_text');
            $table->json('mission_points')->nullable(); // Store list items as JSON
            $table->string('mission_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival_visions');
    }
};
