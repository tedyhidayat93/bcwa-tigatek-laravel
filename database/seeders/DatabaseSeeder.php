<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            ConfigGeneralProfileSeeder::class,
            ConfigMailSenderSeeder::class,
            PackageSeeder::class,
            FaqSeeder::class,
            PagesSeeder::class,
        ]);
    }
}
