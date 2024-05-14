<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payloads = [
            [
                'code' => 'A',
                'name' => 'Pelatihan',
                'slug' => Str::slug('Pelatihan'),
                // 'show_banner' => 0,
                'banner' => null,
                'link_video' => null,
                'caption' => 'Caption Program',
                'description' => 'Deskripsi Program',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'code' => 'B',
                'name' => 'Pendidikan',
                'slug' => Str::slug('Pendidikan'),
                // 'show_banner' => 0,
                'banner' => null,
                'link_video' => null,
                'caption' => 'Caption Program',
                'description' => 'Deskripsi Program',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'code' => 'C',
                'name' => 'Penelitian',
                'slug' => Str::slug('Penelitian'),
                // 'show_banner' => 0,
                'banner' => null,
                'link_video' => null,
                'caption' => 'Caption Program',
                'description' => 'Deskripsi Program',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'code' => 'D',
                'name' => 'Pengembangan',
                'slug' => Str::slug('Pengembangan'),
                // 'show_banner' => 0,
                'banner' => null,
                'link_video' => null,
                'caption' => 'Caption Program',
                'description' => 'Deskripsi Program',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];

        foreach ($payloads as $row) {
            DB::table('programs')->insert($row);
        }
    }
}
