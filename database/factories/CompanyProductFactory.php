<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyProduct>
 */
class CompanyProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id'=>fake()->numberBetween(1,20),
            'name'=>fake()->company(),
            'image_path'=>fake()->imageUrl(),
            'price'=>fake()->numberBetween(0,1299)
        ];
    }
}
