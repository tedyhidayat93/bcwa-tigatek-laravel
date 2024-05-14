<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParticipantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payloads = [
            [
                'name' => 'Mentor',
                'slug' => Str::slug('Mentor'),
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Speaker',
                'slug' => Str::slug('Speaker'),
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Participant',
                'slug' => Str::slug('participant'),
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];

        foreach ($payloads as $row) {
            DB::table('participant_types')->insert($row);
        }
    }
}
