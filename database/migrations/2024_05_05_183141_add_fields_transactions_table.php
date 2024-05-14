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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('participant_id')->nullable()->after('cart_id');
            $table->string('payer_name')->nullable()->after('participant_id');
            $table->string('payer_phone')->nullable()->after('payer_name');
            $table->string('payer_email')->nullable()->after('payer_phone');
            $table->text('payer_address')->nullable()->after('payer_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('participant_id');
            $table->dropColumn('payer_name');
            $table->dropColumn('payer_phone');
            $table->dropColumn('payer_email');
            $table->dropColumn('payer_address');
        });
    }
};
