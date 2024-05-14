<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigPaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'PAYMENT_GATEWAY',
                'code' => 'XENDIT_PAYMENT_GATEWAY_GLOBAL_ADMIN_FEE',
                'name' => 'Xendit Global Admin Fee',
                'description' => 'Admin fee for per/transaction',
                'value' => 5000,
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'PAYMENT_GATEWAY',
                'code' => 'XENDIT_PAYMENT_GATEWAY_TOKEN_CALLBACK_PROUCTION',
                'name' => 'Xendit Token Callback Production',
                'description' => 'Token Callback For Production Mode',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'PAYMENT_GATEWAY',
                'code' => 'XENDIT_PAYMENT_GATEWAY_TOKEN_CALLBACK_DEVELOPMENT',
                'name' => 'Xendit Token Callback Development',
                'description' => 'Token Callback For Development Mode',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'PAYMENT_GATEWAY',
                'code' => 'XENDIT_PAYMENT_GATEWAY_API_KEY_DEVELOPMENT',
                'name' => 'Xendit Api Key Development',
                'description' => 'Api Key For Development Mode',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'PAYMENT_GATEWAY',
                'code' => 'XENDIT_PAYMENT_GATEWAY_API_KEY_PRODUCTION',
                'name' => 'Xendit Api Key Production',
                'description' => 'Api Key For Production Mode',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'PAYMENT_GATEWAY',
                'code' => 'PAYMENT_GATEWAY_MODE',
                'name' => 'Environment Mode',
                'description' => 'Payment Gateway Mode (DEVELOPMENT/PRODUCTION)',
                'value' => 'DEVELOPMENT',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];

        foreach ($payload as $post) {
            DB::table('config_variables')->insert($post);
        }
    }
}
