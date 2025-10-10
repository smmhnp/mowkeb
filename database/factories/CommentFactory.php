<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => fake()->numberBetween(1, 5),
            'name' => fake()->title(),
            'content' => fake()->paragraph(),
            'response' => fake()->randomElement(["", "", fake()->paragraph()]),
            'status' => fake()->randomElement(['inactive', 'active'])
        ];
    }
}
