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
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'category')) {
                $table->string('category')->nullable()->after('title');
            }
            if (!Schema::hasColumn('pages', 'order')) {
                $table->integer('order')->default(0)->after('category');
            }
            if (!Schema::hasColumn('pages', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('order');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['category', 'order', 'is_active']);
        });
    }
};
