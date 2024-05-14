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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('external_id');
            $table->integer('transaction_id');
            $table->string('payer_name')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('payer_phone')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_channel')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('merchant_name')->nullable();
            $table->string('checkout_link')->nullable();
            $table->string('amount')->nullable();

            $table->string('status')->default('PENDING'); // (settled|pending|paid|expired)
            $table->text('note')->nullable(); // (settled|pending|paid|expired)
            $table->longText('json_callback')->nullable(); // (settled|pending|paid|expired)

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
