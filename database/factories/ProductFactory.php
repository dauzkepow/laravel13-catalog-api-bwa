<?php

// Generate Fake Data
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 500), // $10 - $500
            'stock' => fake()->numberBetween(0, 100),
            'sku' => strtoupper(fake()->unique()->bothify('PRD-####-??')),
            'is_active' => fake()->boolean(90), // 90% active
        ];
    }
}
