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
        Schema::create('config_layouts', function (Blueprint $table) {
            $table->integer('page_id')->nullable();
            $table->string('code')->nullable();
            $table->string('group')->nullable();
            $table->string('section')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('value')->nullable();
            $table->enum('form_type', ['radio', 'checkbox', 'number', 'text', 'file', 'date', 'datetime']);
            $table->integer('is_active')->default(0);
            $table->integer('sequence')->nullable();
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
        Schema::dropIfExists('config_layouts');
    }
};
