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
        Schema::table('festival_presentations', function (Blueprint $table) {
            $table->json('points')->nullable()->after('description');
            $table->string('btn1_text')->nullable()->after('points');
            $table->string('btn1_link')->nullable()->after('btn1_text');
            $table->string('btn2_text')->nullable()->after('btn1_link');
            $table->string('btn2_link')->nullable()->after('btn2_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('festival_presentations', function (Blueprint $table) {
            $table->dropColumn(['points', 'btn1_text', 'btn1_link', 'btn2_text', 'btn2_link']);
        });
    }
};
