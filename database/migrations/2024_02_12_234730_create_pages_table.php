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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['menu', 'page', 'link', 'shortcut'])->default('page');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->longText('value')->nullable();
            $table->integer('is_default')->default(0);
            $table->integer('is_show_in_footer')->default(0);
            $table->integer('sequence')->nullable();
            $table->integer('is_active')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
