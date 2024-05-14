<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create Permissions
        $permissions = [
            'view main dashboard',
            
            'view profile',
            'update profile',
            'deactive profile',

            'view role',
            'create role',
            'update role',
            'delete role',

            'view permission',
            'create permission',
            'update permission',
            'delete permission',

            'view user',
            'create user',
            'update user',
            'delete user',
            'suspend user',

            'view article',
            'create article',
            'update article',
            'publish article',
            'highlight article',
            'delete article',

            'view article type',
            'create article type',
            'update article type',
            'delete article type',

            'view article category',
            'create article category',
            'update article category',
            'delete article category',

            'view testimonial',
            'update testimonial',
            'delete testimonial',
            'publish testimonial',
            
            'view feedback',
            'create feedback',
            'update feedback',
            'delete feedback',
            'publish feedback',
            
            'view faqs',
            'create faqs',
            'update faqs',
            'delete faqs',
            
            'view gallery',
            'create gallery',
            'update gallery',
            'delete gallery',
            'publish gallery',
            
            'view medmaestro event',
            'create medmaestro event',
            'update medmaestro event',
            'delete medmaestro event',
            'publish medmaestro event',

            'view medmaestro product',
            'create medmaestro product',
            'update medmaestro product',
            'delete medmaestro product',
            'publish medmaestro product',
            
            'view partners',
            'create partners',
            'update partners',
            'delete partners',
            
            'view participant',
            'create participant',
            'update participant',
            'delete participant',
            
            'view mentor',
            'create mentor',
            'update mentor',
            'delete mentor',
            
            'view certificate',
            'create certificate',
            'update certificate',
            'delete certificate',

            'view medmaestro type',
            'create medmaestro type',
            'update medmaestro type',
            'delete medmaestro type',
            
            'view transaction',
            'create transaction',
            'update transaction',
            'delete transaction',

            'view voucher',
            'create voucher',
            'update voucher',
            'delete voucher',

            'view invoice',
            'create invoice',
            'update invoice',
            'delete invoice',

            'view reporting',
            'download reporting',
            
            'view log',
            'create log',
            'update log',
            'delete log',

            'view ui config',
            'update ui config',
            'view system config',
            'update system config',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $financeRole = Role::create(['name' => 'finance']);
        $writerRole = Role::create(['name' => 'writer']);
        $partnerRole = Role::create(['name' => 'partner']);
        $userRole = Role::create(['name' => 'user']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();
        $superAdminRole->givePermissionTo($allPermissionNames);

        // Let's give few permissions to admin role.
        $writerRole->givePermissionTo(['view main dashboard']);
        $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
        $adminRole->givePermissionTo(['create article', 'view article', 'update article']);
        
        // Let's give few permissions to admin role.
        $writerRole->givePermissionTo(['view main dashboard']);
        $writerRole->givePermissionTo(['create article', 'view article', 'update article']);


        // Let's Create User and assign Role to it

        $superAdminUser = User::firstOrCreate([
                    'email' => 'superadmin@fictro.com',
                ], [
                    'name' => 'Super Admin',
                    'username' => 'superadmin',
                    'email' => 'superadmin@fictro.com',
                    'password' => Hash::make('12345678'),
                    'phone' => $faker->unique()->phoneNumber,
                    'gender' => null,
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

        $superAdminUser->assignRole($superAdminRole);

        $adminUser = User::firstOrCreate([
                            'email' => 'admin@fictro.com'
                        ], [
                            'name' => 'Admin',
                            'username' => 'admin',
                            'email' => 'admin@fictro.com',
                            'password' => Hash::make('password'),
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

        $adminUser->assignRole($adminRole);

        // $writerUser = User::firstOrCreate([
        //                     'email' => 'writer1@fictro.com',
        //                 ], [
        //                     'name' => 'Stevani',
        //                     'username' => 'writer1',
        //                     'email' => 'writer1@fictro.com',
        //                     'password' => Hash::make('password'),
        //                     'phone' => $faker->unique()->phoneNumber,
        //                     'gender' => $faker->randomElement(['male', 'female']),
        //                     'avatar' => null,
        //                     'short_bio' => $faker->sentence,
        //                     'address' => $faker->address,
        //                     'social_media' => json_encode([
        //                         'linkedin' => '#',
        //                         'instagram' => '#',
        //                         'facebook' => '#',
        //                         'twitter' => '#',
        //                         'tiktok' => '#',
        //                         'youtube' => '#',
        //                         'phone' => '#',
        //                         'whatsapp' => '#'
        //                     ]),
        //                     'password' => Hash::make('password'), // Change 'password' to desired default password
        //                     'remember_token' => Str::random(10),
        //                     'email_verified_at' => now(),
        //                     'status' => 'active',
        //                     'partner_id' => null,
        //                     'suspend_to' => null,
        //                     'created_at' => now(),
        //                     'updated_at' => now(),
        //                     'last_login' => json_encode([
        //                         'datetime' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        //                         'location' => $faker->address,
        //                         'device' => $faker->word,
        //                         'ip' => $faker->ipv4
        //                     ]),
        //                 ]);

        // $writerUser->assignRole($writerRole);

        // $writerUser2 = User::firstOrCreate([
        //                     'email' => 'writer2@fictro.com',
        //                 ], [
        //                     'name' => 'Smith',
        //                     'username' => 'writer2',
        //                     'email' => 'writer2@fictro.com',
        //                     'password' => Hash::make('password'),
        //                     'phone' => $faker->unique()->phoneNumber,
        //                     'gender' => $faker->randomElement(['male', 'female']),
        //                     'avatar' => null,
        //                     'short_bio' => $faker->sentence,
        //                     'address' => $faker->address,
        //                     'social_media' => json_encode([
        //                         'linkedin' => '#',
        //                         'instagram' => '#',
        //                         'facebook' => '#',
        //                         'twitter' => '#',
        //                         'tiktok' => '#',
        //                         'youtube' => '#',
        //                         'phone' => '#',
        //                         'whatsapp' => '#'
        //                     ]),
        //                     'password' => Hash::make('password'), // Change 'password' to desired default password
        //                     'remember_token' => Str::random(10),
        //                     'email_verified_at' => now(),
        //                     'status' => 'active',
        //                     'partner_id' => null,
        //                     'suspend_to' => null,
        //                     'created_at' => now(),
        //                     'updated_at' => now(),
        //                     'last_login' => json_encode([
        //                         'datetime' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        //                         'location' => $faker->address,
        //                         'device' => $faker->word,
        //                         'ip' => $faker->ipv4
        //                     ]),
        //                 ]);

        // $writerUser2->assignRole($writerRole);
       
        // $writerUser3 = User::firstOrCreate([
        //                     'email' => 'writer3@fictro.com',
        //                 ], [
        //                     'name' => 'Smith',
        //                     'username' => 'writer3',
        //                     'email' => 'writer3@fictro.com',
        //                     'password' => Hash::make('password'),
        //                     'phone' => $faker->unique()->phoneNumber,
        //                     'gender' => $faker->randomElement(['male', 'female']),
        //                     'avatar' => null,
        //                     'short_bio' => $faker->sentence,
        //                     'address' => $faker->address,
        //                     'social_media' => json_encode([
        //                         'linkedin' => '#',
        //                         'instagram' => '#',
        //                         'facebook' => '#',
        //                         'twitter' => '#',
        //                         'tiktok' => '#',
        //                         'youtube' => '#',
        //                         'phone' => '#',
        //                         'whatsapp' => '#'
        //                     ]),
        //                     'password' => Hash::make('password'), // Change 'password' to desired default password
        //                     'remember_token' => Str::random(10),
        //                     'email_verified_at' => now(),
        //                     'status' => 'active',
        //                     'partner_id' => null,
        //                     'suspend_to' => null,
        //                     'created_at' => now(),
        //                     'updated_at' => now(),
        //                     'last_login' => json_encode([
        //                         'datetime' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        //                         'location' => $faker->address,
        //                         'device' => $faker->word,
        //                         'ip' => $faker->ipv4
        //                     ]),
        //                 ]);

        // $writerUser3->assignRole($writerRole);

        for ($i = 0; $i < 5; $i++) {
            $writer = User::create([
                'name' => 'Writer ' . ($i + 1),
                'username' => $faker->unique()->userName,
                'email' => 'writer' . ($i + 1) . '@fictro.com',
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
            $writer->assignRole($writerRole);
        }
    }
}