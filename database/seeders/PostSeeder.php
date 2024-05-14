<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Title 1',
                'slug' => 'slug-1',
                'code' => 'FCTR.T001',
                'post_category_id' => 1,
                'caption' => 'Caption 1',
                'content_medizine' => 'Content 1',
                'show_cover_type' => 'image',
                'cover_link' => 'https://test.link',
                'cover_image' => 'thumbnail.jpeg',
                'banner' => 'banner.jpeg',
                'is_highlight' => 0,
                'can_export_pdf' => 1,
                'attachment' => json_encode([
                    'title' => 'Attachment 1',
                    'file_name' => 'attachment-1.pdf',
                    'path' => 'uploads/medizine/attachment/',
                ]),
                'reference' => 'https://test.pdf',
                'visitor' => 0,
                'history' => json_encode([[
                    'by' => 'Albert',
                    'datetime' => Carbon::now(),
                    'message' => 'Published by Albert',
                ]]),
                'created_by' => 1,
                'publish_by' => 1,
                'publish_at' => Carbon::now(),
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Title 2',
                'slug' => 'slug-2',
                'code' => 'FCTR.E001',
                'post_category_id' => 3,
                'caption' => 'Caption 1',
                'content_medizine' => 'Content 1',
                'show_cover_type' => 'image',
                'cover_link' => 'https://test.link',
                'cover_image' => 'thumbnail.jpeg',
                'banner' => 'banner.jpeg',
                'is_highlight' => 0,
                'can_export_pdf' => 1,
                'attachment' => json_encode([
                    'title' => 'Attachment 1',
                    'file_name' => 'attachment-1.pdf',
                    'path' => 'uploads/medizine/attachment/',
                ]),
                'reference' => 'https://test.pdf',
                'visitor' => 0,
                'history' => json_encode([[
                    'by' => 'Albert',
                    'datetime' => Carbon::now(),
                    'message' => 'Published by Albert',
                ]]),
                'created_by' => 1,
                'publish_by' => 1,
                'publish_at' => Carbon::now(),
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Title 3',
                'slug' => 'slug-3',
                'code' => 'FCTR.N001',
                'post_category_id' => 4,
                'caption' => 'Caption 1',
                'content_medizine' => 'Content 3',
                'show_cover_type' => 'image',
                'cover_link' => 'https://test.link',
                'cover_image' => 'thumbnail.jpeg',
                'banner' => 'banner.jpeg',
                'is_highlight' => 0,
                'can_export_pdf' => 1,
                'attachment' => json_encode([
                    'title' => 'Attachment 1',
                    'file_name' => 'attachment-1.pdf',
                    'path' => 'uploads/medizine/attachment/',
                ]),
                'reference' => 'https://test.pdf',
                'visitor' => 0,
                'history' => json_encode([[
                    'by' => 'Albert',
                    'datetime' => Carbon::now(),
                    'message' => 'Published by Albert',
                ]]),
                'created_by' => 1,
                'publish_by' => 1,
                'publish_at' => Carbon::now(),
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // add more post data here
        ];

        foreach ($posts as $post) {
            DB::table('posts')->insert($post);
        }
    }
}
