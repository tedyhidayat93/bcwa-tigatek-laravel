<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'package 1',
                'slug' => Str::slug('package-1'),
                'code' => null,
                'min_quota' => 1,
                'max_quota' => 10,
                'price' => 0,
                'unit' => '/pesan',
                'banner' => null,
                'description' => 'Kuota Broadcast',
                'sequence' => 1,
                'is_active' => 1,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'name' => 'package 2',
                'slug' => Str::slug('package-2'),
                'code' => null,
                'min_quota' => 1000,
                'max_quota' => 99000,
                'price' => 250,
                'unit' => '/pesan',
                'banner' => null,
                'description' => 'Kuota Broadcast',
                'sequence' => 2,
                'is_active' => 1,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'name' => 'package 3',
                'slug' => Str::slug('package-3'),
                'code' => null,
                'min_quota' => 100000,
                'max_quota' => 499999,
                'price' => 230,
                'unit' => '/pesan',
                'banner' => null,
                'description' => 'Kuota Broadcast',
                'sequence' => 3,
                'is_active' => 1,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'name' => 'package 4',
                'slug' => Str::slug('package-4'),
                'code' => null,
                'min_quota' => 500000,
                'max_quota' => 999999,
                'price' => 220,
                'unit' => '/pesan',
                'banner' => null,
                'description' => 'Kuota Broadcast',
                'sequence' => 4,
                'is_active' => 1,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'name' => 'package 5',
                'slug' => Str::slug('package-5'),
                'code' => null,
                'min_quota' => 1000000,
                'max_quota' => 2000000,
                'price' => 200,
                'unit' => '/pesan',
                'banner' => null,
                'description' => 'Kuota Broadcast',
                'sequence' => 5,
                'is_active' => 1,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ]
        ];

        foreach ($packages as $package) {
            DB::table('packages')->insert($package);
        }
    }
}
