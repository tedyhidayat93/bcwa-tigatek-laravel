<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $payloads = [
            [
                'program_id' => 1,
                'name' => 'Training',
                'slug' => Str::slug('Training'),
                'code' => 'T',
                'banner' => null,
                // 'show_banner' => 0,
                'caption' => 'Caption',
                'description' => 'Description',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'program_id' => 3,
                'name' => 'Research',
                'slug' => Str::slug('Research'),
                'code' => 'R',
                'banner' => null,
                // 'show_banner' => 0,
                'caption' => 'Caption',
                'description' => 'Description',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'program_id' => 2,
                'name' => 'Education',
                'slug' => Str::slug('Education'),
                'code' => 'E',
                'banner' => null,
                // 'show_banner' => 0,
                'caption' => 'Caption',
                'description' => 'Description',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'program_id' => null,
                'name' => 'News',
                'slug' => Str::slug('News'),
                'code' => 'N',
                'banner' => null,
                // 'show_banner' => 0,
                'caption' => 'Caption',
                'description' => 'Description',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'program_id' => 4,
                'name' => 'Development',
                'slug' => Str::slug('Development'),
                'code' => 'D',
                'banner' => null,
                // 'show_banner' => 0,
                'caption' => 'Caption',
                'description' => 'Description',
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];

        foreach ($payloads as $post_category) {
            DB::table('post_categories')->insert($post_category);
        }
    }
}
