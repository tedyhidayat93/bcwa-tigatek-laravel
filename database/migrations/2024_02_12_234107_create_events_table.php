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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->integer('price')->default(0);
            $table->integer('program_id')->nullable();
            $table->integer('type_activity_id')->nullable();
            $table->enum('event_type', ['internal', 'external'])->default('external');
            $table->integer('organizer_id')->nullable(); //from partner
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->text('schedule')->nullable();
            $table->text('speaker')->nullable();
            $table->text('location')->nullable();

            $table->text('duration')->nullable(); //JPL
            $table->text('credit')->nullable(); //SKP
            $table->text('credit_participant')->nullable(); //SKP
            $table->text('credit_speaker')->nullable(); //SKP
            $table->text('credit_instructor')->nullable(); //SKP
            $table->text('credit_moderator')->nullable(); //SKP
            $table->text('credit_commite')->nullable(); //SKP

            $table->text('skp_idi')->nullable();
            $table->text('skp_ppni')->nullable();
            $table->text('skp_iai')->nullable();

            $table->enum('default_thumbnail', ['image', 'link'])->default('image');
            $table->string('thumbnail_image')->nullable();
            $table->string('thumbnail_link')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('cert_background')->nullable();
            $table->longText('attachments')->nullable();

            $table->integer('generate_certificate')->default(0);
            $table->integer('is_required_hotel')->default(0);
            $table->integer('is_discount_group')->default(0);

            $table->integer('is_highlight')->default(0);
            $table->integer('is_recomend')->default(0);
            
            $table->integer('visitor')->default(0);
            $table->longText('history')->nullable();
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('events');
    }
};
