<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigGeneralTitleFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_FOOTER_BRAND',
                'name' => 'Footer Brand',
                'description' => 'Your Brand/Application. This is displayed in the footer section on the front page of the website.',
                'value' => 'BRAND | TAGLINE',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ]
        ];

        foreach ($payload as $post) {
            DB::table('config_variables')->insert($post);
        }
    }
}
