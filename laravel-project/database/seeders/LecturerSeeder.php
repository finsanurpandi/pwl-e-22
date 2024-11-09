<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        for($i=0; $i < 50; $i++) {
            DB::table('lecturers')->insert([
                'nidn' => rand(1111111111, 9999999999),
                'firstname' => $faker->firstName,
                'last_name' => $faker->lastName,
                'department_id' => rand(1,3)
            ]);
        }
    }
}
