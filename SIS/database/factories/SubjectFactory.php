<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'subject' => $this->faker->randomElement(['AppDev', 'IAS2', 'Multimedia', 'WST', 'SIA2', 'Networking2', 'IPT2', 'IAS']),
            'description' => $this->faker->sentence,
            'code' => $this->faker->randomElement(['T111', 'T112', 'T113', 'T114', 'T115',]),
            'units' => $this->faker->numberBetween(1, 5),
            'semester' => $this->faker->randomElement(['1st Semester', '2nd Semester']),
        ];
    }
}
