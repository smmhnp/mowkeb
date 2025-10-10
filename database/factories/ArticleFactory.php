<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 5),
            'video_id' => fake()->numberBetween(1, 5),
            'user_id' => fake()->numberBetween(1, 5),
            'name' => fake()->title(),
            'content' => fake()->paragraph(),
            'cover' => fake()->url(),
            'view' => fake()->numberBetween(200, 500),
            'status' => fake()->randomElement(['allow', 'unauthorized'])
        ];
    }
}
