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
            // UsersSeeder::class,
            UserRolePermissionSeeder::class,
            ProgramSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            ConfigGeneralProfileSeeder::class,
            ConfigMedizineSeeder::class,
            ConfigMailSenderSeeder::class,
            ConfigWaBlastSeeder::class,
            ParticipantPermissionSeeder::class,
            ParticipantTypeSeeder::class,
            ProgramAndProgramTypePermissionSeeder::class,
            InformationSeeder::class,
            MessageSeeder::class,
            ConfigGeneralTitleFooterSeeder::class,
            PagesPermissionSeeder::class,
            PagesSeeder::class,
            ConfigPaymentGatewaySeeder::class,
        ]);
    }
}
