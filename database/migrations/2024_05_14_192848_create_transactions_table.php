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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('buyer_agree_terms')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->date('date');
            $table->string('inv_number')->nullable();
            $table->integer('package_id')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('qty');
            $table->integer('amount');
            $table->string('payment_method')->nullable();
            $table->enum('status', ['PENDING','EXPIRED','PAID','REJECTED'])->default('PENDING');
            $table->string('payment_proof')->nullable();
            $table->timestamp('payment_proof_date')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
