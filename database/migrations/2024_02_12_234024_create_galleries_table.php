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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->enum('module', ['article', 'event', 'product', 'gallery'])->nullable()->default('gallery');
            $table->enum('type', ['link', 'image'])->nullable()->default('image');
            $table->integer('item_id')->nullable();
            $table->string('file_name');
            $table->string('thumbnail')->nullable();
            $table->string('extension');
            $table->string('size');
            $table->string('path');
            $table->integer('is_thumbnail')->default(0);
            $table->integer('show_thumbnail')->default(1);
            $table->longText('caption')->nullable();
            $table->longText('description')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('galleries');
    }
};
