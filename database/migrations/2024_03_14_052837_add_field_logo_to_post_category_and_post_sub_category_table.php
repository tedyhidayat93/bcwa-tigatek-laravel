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
        Schema::table('post_categories', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('banner');
        });
        Schema::table('post_sub_categories', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('banner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_categories', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
        Schema::table('post_sub_categories', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
