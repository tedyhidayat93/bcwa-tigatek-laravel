<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigMedizineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_LOGO',
                'name' => 'Default Medizine Logo Cover',
                'description' => 'Default thumbnail logo displayed when Medizine is shared.',
                'value' => 'thumbnail.jpeg',
                'form_type' => 'file',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_THUMBNAIL_SHARE',
                'name' => 'Default Medizine Share Thumbnail',
                'description' => 'Default thumbnail displayed when Medizine is shared.',
                'value' => 'thumbnail.jpeg',
                'form_type' => 'file',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_HEADER_PDF',
                'name' => 'Default Medizine PDF Header',
                'description' => 'Default header part of the PDF when the article is downloaded.',
                'value' => 'thumbnail.jpeg',
                'form_type' => 'file',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_FOOTER_PDF',
                'name' => 'Default Medizine PDF Footer',
                'description' => 'Default footer part of the PDF when the article is downloaded.',
                'value' => 'thumbnail.jpeg',
                'form_type' => 'file',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_BODY_BACKGROUND_PDF',
                'name' => 'Default Medizine PDF Body Background',
                'description' => 'Default background of the body/content of the PDF when the article is downloaded.',
                'value' => 'thumbnail.jpeg',
                'form_type' => 'file',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_META_KEYWORD',
                'name' => 'Default Medizine Meta Keywords',
                'description' => 'Default SEO meta keywords displayed when Medizine is shared.',
                'value' => '-',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MEDIZINE',
                'code' => 'MEDIZINE_DEFAULT_META_DESCRIPTION',
                'name' => 'Default Medizine Meta Description',
                'description' => 'Default description of Medizine.',
                'value' => '-',
                'form_type' => 'textarea',
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
