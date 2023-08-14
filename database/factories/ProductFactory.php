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
            'title' => '3Д принтер ' . fake()->words(3, true),
            'short_description' => fake()->sentence(15),
            'description' => fake()->paragraph(15),
            'image' => rand(1, 30) . '.jpg',
            'price' => rand(4000, 50000),
            'is_active' => fake()->boolean(90)
        ];
    }
}
