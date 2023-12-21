<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Space>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->numberBetween(1, 100),
            'currency' => $this->faker->currencyCode(),
            'from' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'to' => $this->faker->dateTimeBetween('now', '+1 month'),
         ];
    }
}
