<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->numberBetween(1,11),
            'category_id'=>fake()->numberBetween(1,20),
            'name'=>fake()->name(),
            'price'=>fake()->numberBetween(0,599),
            'image'=>fake()->imageUrl(),
            'count'=>fake()->numberBetween(0,1000),
            'premium'=>fake()->boolean(40)
        ];
    }
}
