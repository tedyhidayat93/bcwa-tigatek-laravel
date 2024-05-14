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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('fullname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('whatsapp')->unique();
            $table->enum('gender', ['male','female'])->nullable();
            $table->string('avatar')->nullable();
            $table->text('short_bio')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->text('social_media')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['active','inactive','suspend'])->default('inactive');
            $table->integer('participant_type_id')->nullable();
            $table->integer('participant_category_id')->nullable();
            $table->integer('participant_sub_category_id')->nullable();
            $table->timestamp('suspend_to')->nullable();
            $table->text('last_activity')->nullable();
            $table->text('last_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('participants');
    }
};
