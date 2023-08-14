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
            'name' => fake()->name(),
            'number' => fake()->numerify('+380#########'),
            'comment' => fake()->boolean(15) ? fake()->sentence(15) : null,
            'product_id' => rand(1, 50),
            'status' => fake()->boolean(98) ? rand(0, 5) : 6,
        ];
    }
}
