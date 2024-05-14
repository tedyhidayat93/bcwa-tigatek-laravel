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
        Schema::table('participant_categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });
        Schema::table('participant_sub_categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participant_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('participant_sub_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
