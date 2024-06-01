<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nameAndSlug = [
            'Mathematics' => 'mathematics',
            'Literature' => 'literature',
            'English' => 'english',
            'Biology' => 'biology',
            'Chemistry' => 'chemistry',
            'Physics' => 'physics',
            'Civic Education' => 'civic-education',
            'History' => 'history',
            'Geography' => 'geography',
            'Informatics' => 'informatics',
            'Music' => 'music',
        ];

        $name = $this->faker->unique()->randomElement(array_keys($nameAndSlug));
        $slug = $nameAndSlug[$name];

        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
