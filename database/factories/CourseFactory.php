<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nameAndSlug = [
            'Unit 1' => 'unit-1',
            'Unit 2' => 'unit-2',
            'Unit 3' => 'unit-3',
            'Unit 4' => 'unit-4',
            'Unit 5' => 'unit-5',
            'Unit 6' => 'unit-6',
            'Unit 7' => 'unit-7',
            'Unit 8' => 'unit-8',
            'Unit 9' => 'unit-9',
            'Unit 10' => 'unit-10',
        ];

        $name = $this->faker->unique()->randomElement(array_keys($nameAndSlug));
        $slug = $nameAndSlug[$name];

        $subjectId = Subject::all()->random()->id;

        return [
            'name' => $name,
            'slug' => $slug,
            'subject_id' => $subjectId,
        ];
    }
}
