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
        Schema::create('config_variables', function (Blueprint $table) {
            $table->id();
            $table->string('group');
            $table->string('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->longText('value')->nullable();
            $table->enum('form_type', ['radio', 'checkbox', 'number', 'text', 'textarea', 'file', 'file-non-image', 'date', 'datetime']);
            $table->integer('is_active')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_variables');
    }
};
