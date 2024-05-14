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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            
            $table->integer('min_quota')->nullable();
            $table->integer('max_quota')->nullable();
            $table->integer('price')->nullable();
            $table->string('unit')->nullable();
            
            $table->string('banner')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('packages');
    }
};
