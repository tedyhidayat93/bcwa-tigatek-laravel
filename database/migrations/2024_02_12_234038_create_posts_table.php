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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->integer('post_category_id')->nullable();
            $table->integer('post_sub_category_id')->nullable();
            $table->longText('caption')->nullable();
            $table->longText('content_medizine')->nullable();
            $table->string('thumbnail_cover_share')->nullable();
            $table->enum('show_cover_type', ['image', 'link'])->default('image');
            $table->string('cover_link')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('banner')->nullable();
            $table->integer('is_highlight')->default(0);
            $table->integer('can_export_pdf')->default(0);
            $table->string('attachment')->nullable();
            $table->longText('reference')->nullable();
            $table->integer('visitor')->default(0);
            $table->longText('history')->nullable();
            $table->integer('created_by');
            $table->integer('publish_by')->nullable();
            $table->integer('is_publish')->default(0); // only 1: publish or 0: not publish
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('publish_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
