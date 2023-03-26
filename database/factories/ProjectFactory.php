<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(4, true),
            'slug' => fake()->slug(4),
            'description' => fake()->text(rand(150, 225)),
            'is_live' => fake()->boolean(),
            'url' => fake()->url(),
        ];
    }
}
