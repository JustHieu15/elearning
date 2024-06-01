<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nameAndSlug = [
            'English Test' => 'english-test',
            'Math Test' => 'math-test',
            'Science Test' => 'science-test',
            'History Test' => 'history-test',
            'Geography Test' => 'geography-test',
        ];

        $timeLimit = [
            '00:15:00',
            '00:30:00',
            '00:45:00',
            '01:00:00',
            '01:30:00',
            '02:00:00',
        ];

        $name = $this->faker->unique()->randomElement(array_keys($nameAndSlug));
        $slug = $nameAndSlug[$name];

        return [
            'name' => $name,
            'description' => $this->faker->sentence,
            'time_limit' => $this->faker->randomElement($timeLimit),
            'course_id' => Course::all()->random()->id,
            'slug' => $slug,
        ];
    }
}
