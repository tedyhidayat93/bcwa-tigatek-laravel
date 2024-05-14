<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigMailSenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_DEFAULT_TITLE',
                'name' => 'Default Title',
                'description' => 'Default email title phrase.',
                'value' => 'Mailer Sender',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_DEFAULT_SUBJECT',
                'name' => 'Default Subject',
                'description' => 'Default email subject phrase.',
                'value' => 'No-Reply',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_DEFAULT_BODY',
                'name' => 'Default Body',
                'description' => 'Default email body/content.',
                'value' => 'Send From Mail',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_HOST',
                'name' => 'SMTP Host',
                'description' => 'SMTP host.',
                'value' => 'sandbox.smtp.mailtrap.io',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_EMAIL',
                'name' => 'Email Address',
                'description' => 'SMTP email address.',
                'value' => 'mail@mailtrap.com',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_USERNAME',
                'name' => 'Username',
                'description' => 'SMTP email sender account username.',
                'value' => '33a6caa59b81cc',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_PASSWORD',
                'name' => 'Password',
                'description' => 'SMTP email account/application password.',
                'value' => 'e31d0f4c6b679c',
                'form_type' => 'text',
                'is_active' => 1, // 1:active | 0:inactive
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'group' => 'MAIL_SENDER',
                'code' => 'MAIL_SENDER_SMTP_PORT',
                'name' => 'Port',
                'description' => 'SMTP port.',
                'value' => '2525',
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
