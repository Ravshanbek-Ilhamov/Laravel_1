<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>fake()->numberBetween(1,20),
            'title'=>fake()->title(),
            'body'=>fake()->text(),
            'likes'=>fake()->numberBetween(),
            'dislikes'=>fake()->numberBetween()
        ];
    }
}
