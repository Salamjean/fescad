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
        Schema::create('commissaire_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('Commissaire Général');
            $table->string('title')->nullable(); // e.g., "Bienvenue au FESCAD"
            $table->text('message');
            $table->string('image')->nullable();
            $table->string('signature_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissaire_messages');
    }
};
