<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigGeneralProfileSeeder extends Seeder
{
    /**
     * Jalankan database seed.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_LOGO',
                'name' => 'Logo Brand',
                'description' => 'Logo aplikasi yang diterapkan di semua halaman',
                'value' => '',
                'form_type' => 'file',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_NAME',
                'name' => 'Nama Brand',
                'description' => 'Nama brand/aplikasi Anda',
                'value' => 'Broadcast WhatsApp',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_TAGLINE',
                'name' => 'Tagline',
                'description' => 'Tagline brand Anda',
                'value' => 'By Tiga Teknologi Persada',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_FOOTER_BRAND',
                'name' => 'Footer Brand',
                'description' => 'Brand/Aplikasi Anda. Ini ditampilkan di bagian footer pada halaman depan situs web.',
                'value' => 'Broadcast WhatsApp By Tiga Teknologi Persada',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_CAPTION',
                'name' => 'Informasi Singkat',
                'description' => 'Informasi Singkat Tentang Brand/Aplikasi Anda. Ini ditampilkan di bagian footer pada halaman depan situs web.',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_ABOUT_ME',
                'name' => 'Tentang Brand/Aplikasi Anda',
                'description' => 'Halaman Informasi Tentang Kami, berisi informasi tentang Brand/Aplikasi Anda',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_BANK_NAME',
                'name' => 'Nama Bank',
                'description' => 'Nama Bank yang digunakan untuk tujuan transfer',
                'value' => 'BCA',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_BANK_REKENING_NUMBER',
                'name' => 'Nomor Rekening Bank',
                'description' => 'Nomor Rekening Bank untuk tujuan transfer',
                'value' => '0982388323',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_BANK_OWNER',
                'name' => 'Bank Atas Nama',
                'description' => 'Atas Nama Nomor Rekening Bank',
                'value' => 'PT. Tiga Teknologi Persada',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_EMAIL',
                'name' => 'Email Utama',
                'description' => 'Email utama brand Anda. Ditampilkan di halaman depan situs web',
                'value' => 'info@tigatek.com',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_CONTACT',
                'name' => 'Nomor Telepon Utama',
                'description' => 'Nomor telepon brand Anda. Ditampilkan di halaman depan situs web',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_WHATSAPP',
                'name' => 'Tautan Langsung WhatsApp',
                'description' => 'Tautan ke akun WhatsApp Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_INSTAGRAM',
                'name' => 'Instagram',
                'description' => 'Tautan ke akun Instagram Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_LINKEDIN',
                'name' => 'LinkedIn',
                'description' => 'Tautan ke akun LinkedIn Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_FACEBOOK',
                'name' => 'Facebook',
                'description' => 'Tautan ke akun Facebook Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_X',
                'name' => 'X/Twitter',
                'description' => 'Tautan ke akun X/Twitter Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_YOUTUBE',
                'name' => 'Youtube',
                'description' => 'Tautan ke akun Youtube Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_TIKTOK',
                'name' => 'Tiktok',
                'description' => 'Tautan ke akun Tiktok Anda',
                'value' => '#',
                'form_type' => 'text',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_ADDRESS',
                'name' => 'Alamat Lengkap',
                'description' => 'Informasi alamat lengkap posisi perusahaan Anda',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_GMAPS',
                'name' => 'Google Maps',
                'description' => 'Tautan semat lokasi Google Maps perusahaan/brand Anda',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_OPERATIONAL_HOUR',
                'name' => 'Jam Operasional',
                'description' => 'Informasi Jam Operasional perusahaan/brand Anda',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_META_KEYWORD',
                'name' => 'Kata Kunci Meta Default',
                'description' => 'Sebagai kata kunci SEO meta default yang ditampilkan saat berbagi',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'GENERAL_PROFILE',
                'code' => 'GENERAL_PROFILE_META_DESCRIPTION',
                'name' => 'Deskripsi Meta Default',
                'description' => 'Sebagai deskripsi meta SEO default saat berbagi tautan',
                'value' => '#',
                'form_type' => 'textarea',
                'is_active' => 1, // 1:aktif | 0:nonaktif
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
