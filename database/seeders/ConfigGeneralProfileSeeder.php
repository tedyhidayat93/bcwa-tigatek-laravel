<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigGeneralProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_LOGO',
                'name' => 'Brand Logo',
                'description' => 'Application logo applied to all pages',
                'value' => '',
                'form_type' => 'file',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_NAME',
                'name' => 'Brand Name',
                'description' => 'Your brand/application name',
                'value' => 'Fictro',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_TAGLINE',
                'name' => 'Tagline',
                'description' => 'Your brand tagline',
                'value' => 'Healthcare Development & Innovation Center',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
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
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_CAPTION',
                'name' => 'Short Information',
                'description' => 'Short Information About Your Brand/Application. This is displayed in the footer section on the front page of the website.',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_ABOUT_ME',
                'name' => 'About Your Brand/Application',
                'description' => 'Information page About Us, contains information about your Brand/Application',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_VISION',
                'name' => 'Vision of Company',
                'description' => 'Information page About Us section Vision',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_MISSION',
                'name' => 'Mission of Company',
                'description' => 'Information page About Us section Mission',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_LINK_ABOUT_ME',
                'name' => 'Link to Brand/Company Profile Video',
                'description' => 'Video information displayed on the front page. If not filled, it will not be displayed',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_COMPANY_PROFILE',
                'name' => 'PDF Company Profile About Brand/Company',
                'description' => 'Your brand/company\'s Company Profile in PDF form. If not filled, it will not be displayed',
                'value' => '#',
                'form_type' => 'file-non-image',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_EMAIL',
                'name' => 'Primary Email',
                'description' => 'Your brand\'s primary email. Displayed on the front page of the website',
                'value' => 'info@fictro.com',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_CONTACT',
                'name' => 'Primary Phone Number',
                'description' => 'Your brand\'s phone number. Displayed on the front page of the website',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_INSTAGRAM',
                'name' => 'Instagram',
                'description' => 'Link to your Instagram account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_LINKEDIN',
                'name' => 'LinkedIn',
                'description' => 'Link to your LinkedIn account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_FACEBOOK',
                'name' => 'Facebook',
                'description' => 'Link to your Facebook account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_X',
                'name' => 'X/Twitter',
                'description' => 'Link to your X/Twitter account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_YOUTUBE',
                'name' => 'Youtube',
                'description' => 'Link to your Youtube account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_TIKTOK',
                'name' => 'Tiktok',
                'description' => 'Link to your Tiktok account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_WHATSAPP',
                'name' => 'WhatsApp Direct Link',
                'description' => 'Link to your WhatsApp account',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_ADDRESS',
                'name' => 'Full Address',
                'description' => 'Complete address information of your company\'s position',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_GMAPS',
                'name' => 'Google Maps',
                'description' => 'Google Maps location embed link of your company/brand',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_OPERATIONAL_HOUR',
                'name' => 'Operating Hours',
                'description' => 'Operating Hours Information of your company/brand',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_META_KEYWORD',
                'name' => 'Default Meta Keywords',
                'description' => 'As the default SEO meta keywords displayed when shared',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_META_DESCRIPTION',
                'name' => 'Default Meta Description',
                'description' => 'As the default SEO meta description when sharing links',
                'value' => '#',
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
