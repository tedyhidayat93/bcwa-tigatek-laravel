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
        Schema::create('event_addons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('event_id')->nullable();
            $table->string('name');
            $table->string('caption')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('is_required')->default(0);
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
        Schema::dropIfExists('event_addons');
    }
};
