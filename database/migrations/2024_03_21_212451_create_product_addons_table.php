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
        Schema::create('product_addons', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('code');
            $table->string('number')->nullable();
            $table->string('name_id');
            $table->string('name_en');
            $table->string('slug_id');
            $table->string('slug_en');
            $table->text('caption_id')->nullable();
            $table->text('caption_en')->nullable();
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();
            $table->enum('price_type', ['fix','percentage'])->default('fix');
            $table->decimal('price_usd', 50,2)->nullable();
            $table->decimal('price_idr', 50,2)->nullable();
            $table->string('unit_usd')->nullable();
            $table->string('unit_idr')->nullable();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->enum('status', ['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('product_addons');
    }
};
