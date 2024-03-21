<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\StudentFactory; // Make sure this points to the correct namespace
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of fake records you want
        $numberOfStudents = 20;

        // Create fake student records
        Student::factory()->count($numberOfStudents)->create();
    }
}
