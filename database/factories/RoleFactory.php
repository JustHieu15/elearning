<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = [
            '1' => 'Admin',
            '2' => 'Teacher',
            '3' => 'Student',
        ];

        $id = $this->faker->unique()->randomElement(array_keys($roles));
        $role = $roles[$id];

        return [
            'id' => $id,
            'name' => $role,
        ];
    }
}
