<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 50; $i++) {
            $department = DB::table('departments')->inRandomOrder()->first();
            $lecturer = DB::table('lecturers')->where('department_id', $department->id)->inRandomOrder()->first();

            $year = rand(2018, 2024);
            $reg = rand(1, 150);
            $group = '';

            if($reg <= 40 ) {
                $group = 'A';
            } elseif ($reg > 40 && $reg <= 80) {
                $group = 'B';
            } elseif ($reg > 80 && $reg <= 120) {
                $group = 'C';
            } elseif ($reg > 120 && $reg <= 150) {
                $group = 'D';
            } elseif ($reg > 150 && $reg <= 180) {
                $group = 'NR';
            }

            DB::table('students')->insert([
                'npm' => $department->code.''.substr($year, -2).''.sprintf('%03d', $reg),
                'fullname' => $faker->name,
                'year_entry' => $year,
                'group' => $group,
                'nidn' => $lecturer->nidn,
                'department_id' => $department->id
            ]);
        }
    }
}
