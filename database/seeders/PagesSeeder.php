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
                'code' => 'MEDIZINE',
                'name' => 'Kebijakan dan Privasi Penulisan Medizine',
                'slug' => Str::slug('Kebijakan dan Privasi Penulisan Medizine'),
                'banner' => null,
                'caption' => 'Caption Default',
                'description' => 'Description Default',
                'value' => 'Value Default',
                'is_default' => 1,
                'is_active' => 1,
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
                'code' => 'GLOBAL_TERMS',
                'name' => 'Syarat dan Ketentuan',
                'slug' => Str::slug('Syarat dan Ketentuan'),
                'banner' => null,
                'caption' => 'Caption Default',
                'description' => 'Description Default',
                'value' => 'Value Default',
                'is_default' => 1,
                'is_active' => 1,
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
                'code' => '',
                'name' => 'FAQ',
                'slug' => Str::slug('FAQ'),
                'banner' => null,
                'caption' => 'Caption Default',
                'description' => 'Description Default',
                'value' => 'Value Default',
                'is_default' => 0,
                'is_active' => 1,
                'sequence' => 2,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'type' => 'page',
                'code' => '',
                'name' => 'Kebijakan dan Privasi',
                'slug' => Str::slug('Kebijakan dan Privasi'),
                'banner' => null,
                'caption' => 'Caption Default',
                'description' => 'Description Default',
                'value' => 'Value Default',
                'is_default' => 0,
                'is_active' => 1,
                'sequence' => 3,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'type' => 'page',
                'code' => '',
                'name' => 'Syarat Penggunaan',
                'slug' => Str::slug('Syarat Penggunaan'),
                'banner' => null,
                'caption' => 'Caption Default',
                'description' => 'Description Default',
                'value' => 'Value Default',
                'is_default' => 0,
                'is_active' => 1,
                'sequence' => 4,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'type' => 'page',
                'code' => '',
                'name' => 'Pusat Bantuan',
                'slug' => Str::slug('Pusat Bantuan'),
                'banner' => null,
                'caption' => 'Caption Default',
                'description' => 'Description Default',
                'value' => 'Value Default',
                'is_default' => 0,
                'is_active' => 1,
                'sequence' => 5,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];

        foreach ($payloads as $row) {
            DB::table('pages')->insert($row);
        }
    }
}
