<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of fake records you want
        $numberOfSubjects = 20;

        // Create fake student records
        Subject::factory()->count($numberOfSubjects)->create();
    }
}
