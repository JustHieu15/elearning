<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            '1' => 'Semester I',
            '2' => 'Semester II',
        ];

        foreach ($semesters as $id => $name) {
            Semester::create([
                'id' => $id,
                'name' => $name,
            ]);
        }
    }
}
