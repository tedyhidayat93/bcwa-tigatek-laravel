<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payloads = [
            [
                'type' => 'page',
                'code' => 'PRIVACY_POLICY',
                'name' => 'Kebijakan dan Privasi',
                'slug' => Str::slug('Kebijakan dan Privasi'),
                'value' => 'Value Default',
                'is_default' => 1,
                'is_active' => 1,
                'is_show_in_footer' => 1,
                'sequence' => 1,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'type' => 'page',
                'code' => 'TERMS_CONDITION',
                'name' => 'Syarat dan Ketentuan',
                'slug' => Str::slug('Syarat dan Ketentuan'),
                'value' => 'Value Default',
                'is_default' => 1,
                'is_active' => 1,
                'is_show_in_footer' => 1,
                'sequence' => 2,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ]
        ];

        foreach ($payloads as $row) {
            DB::table('pages')->insert($row);
        }
    }
}
