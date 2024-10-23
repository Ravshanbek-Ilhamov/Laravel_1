<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id'=>fake()->numberBetween(1,11),
            'seller_id'=>fake()->numberBetween(1,11),
            'product_id'=>fake()->numberBetween(1,20),
            'count'=>fake()->numberBetween(0,1200),
            'status'=>fake()->word()
        ];
    }
}
