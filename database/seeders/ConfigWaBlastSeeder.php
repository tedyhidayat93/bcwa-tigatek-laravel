<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigWaBlastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'WA_BLAST',
                'code' => 'WA_BLAST_NUMBER',
                'name' => 'WhatsApp Number',
                'description' => 'The number registered with the WhatsApp Blast provider for API integration.',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'WA_BLAST',
                'code' => 'WA_BLAST_API_KEY',
                'name' => 'API Key Account',
                'description' => 'API key of the user account from the WhatsApp Blast vendor dashboard page.',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'WA_BLAST',
                'code' => 'WA_BLAST_NUMBER_KEY',
                'name' => 'WhatsApp Number API Key',
                'description' => 'API key of the registered WhatsApp number, obtained from the WhatsApp Blast vendor dashboard page.',
                'value' => '',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'WA_BLAST',
                'code' => 'WA_BLAST_DEFAULT_MESSAGE',
                'name' => 'Default Message',
                'description' => 'Contains the default message for the message body.',
                'value' => 'Hello, congratulations...',
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
