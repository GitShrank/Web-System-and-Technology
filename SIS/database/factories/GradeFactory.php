<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        $students = Student::pluck('id')->toArray();    //randomly choose a student ID and a subject ID 
        $subjects = Subject::pluck('id')->toArray();    //from the existing data in 'students' and 'subjects' tables.

        return [
            'student_id' => $this->faker->randomElement($students),
            'subject_id' => $this->faker->randomElement($subjects),
            'grade'      => $this->faker->randomElement(['1.0', '1.25', '1.5', '1.75', '2.0']),
            'date'       => $this->faker->date,
            'remarks'    => $this->faker->sentence,
        ];
    }
}
