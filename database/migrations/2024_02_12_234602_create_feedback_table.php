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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['event', 'product'])->default('event');
            $table->integer('item_id');
            $table->integer('question_id');
            $table->string('value');
            $table->text('feedback');
            $table->integer('star'); // 5 stars
            $table->integer('is_show')->default(0);
            $table->integer('is_highlight')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
