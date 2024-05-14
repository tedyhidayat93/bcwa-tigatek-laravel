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
            $table->uuid('uuid');
            $table->integer('cart_id');
            $table->integer('voucher_id')->nullable();
            $table->double('discount')->nullable();
            $table->double('tax')->nullable();
            $table->double('admin')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('grand_total')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->default('PENDING'); // (settled|pending|paid|expired)
            $table->text('note')->nullable(); // (settled|pending|paid|expired)

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('paid_at')->nullable();
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
