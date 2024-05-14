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
            $table->string('payment_evidence')->nullable();
            $table->tinyInteger('buyer_agree_terms')->nullable();
            $table->enum('status', ['pending','expired','paid'])->default('pending');
            $table->timestamp('paid_at')->nullable();
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
