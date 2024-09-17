<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movement')->insertOrIgnore([
            ['id' => 1, 'name' => 'Deadlift'],
            ['id' => 2, 'name' => 'Back Squat'],
            ['id' => 3, 'name' => 'Bench Press'],
        ]);
    }
}
