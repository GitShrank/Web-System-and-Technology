<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of fake records you want
        $numberOfGrades = 20;

        // Create fake student records
        Grade::factory()->count($numberOfGrades)->create();
    }
}
