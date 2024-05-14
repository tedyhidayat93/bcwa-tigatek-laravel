<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
    
        // Superadmin
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'username' => $faker->unique()->userName,
            'email' => 'superadmin@example.com',
            'phone' => $faker->unique()->phoneNumber,
            'gender' => $faker->randomElement(['male', 'female']),
            'avatar' => null,
            'short_bio' => $faker->sentence,
            'address' => $faker->address,
            'social_media' => json_encode([
                'linkedin' => '#',
                'instagram' => '#',
                'facebook' => '#',
                'twitter' => '#',
                'tiktok' => '#',
                'youtube' => '#',
                'phone' => '#',
                'whatsapp' => '#'
            ]),
            'password' => Hash::make('password'), // Change 'password' to desired default password
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'status' => 'active',
            'partner_id' => null,
            'suspend_to' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'last_login' => json_encode([
                'datetime' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'location' => $faker->address,
                'device' => $faker->word,
                'ip' => $faker->ipv4
            ]),
        ]);
    
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => $faker->unique()->userName,
            'email' => 'admin@example.com',
            'phone' => $faker->unique()->phoneNumber,
            'gender' => $faker->randomElement(['male', 'female']),
            'avatar' => null,
            'short_bio' => $faker->sentence,
            'address' => $faker->address,
            'social_media' => json_encode([
                'linkedin' => '#',
                'instagram' => '#',
                'facebook' => '#',
                'twitter' => '#',
                'tiktok' => '#',
                'youtube' => '#',
                'phone' => '#',
                'whatsapp' => '#'
            ]),
            'password' => Hash::make('password'), // Change 'password' to desired default password
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'status' => 'active',
            'partner_id' => null,
            'suspend_to' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'last_login' => json_encode([
                'datetime' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'location' => $faker->address,
                'device' => $faker->word,
                'ip' => $faker->ipv4
            ]),
        ]);
    
        // Writers
        for ($i = 0; $i < 3; $i++) {
            DB::table('users')->insert([
                'name' => 'Writer ' . ($i + 1),
                'username' => $faker->unique()->userName,
                'email' => 'writer' . ($i + 1) . '@example.com',
                'phone' => $faker->unique()->phoneNumber,
                'gender' => $faker->randomElement(['male', 'female']),
                'avatar' => null,
                'short_bio' => $faker->sentence,
                'address' => $faker->address,
                'social_media' => json_encode([
                    'linkedin' => '#',
                    'instagram' => '#',
                    'facebook' => '#',
                    'twitter' => '#',
                    'tiktok' => '#',
                    'youtube' => '#',
                    'phone' => '#',
                    'whatsapp' => '#'
                ]),
                'password' => Hash::make('password'), // Change 'password' to desired default password
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'status' => 'active',
                'partner_id' => null,
                'suspend_to' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'last_login' => json_encode([
                    'datetime' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                    'location' => $faker->address,
                    'device' => $faker->word,
                    'ip' => $faker->ipv4
                ]),
            ]);
        }
    }
}
