<?php

namespace Database\Factories;

use App\Models\Product;
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
            "code" => $this->faker->unique()->swiftBicNumber(),
            "name" => $this->faker->unique()->word(),
            "specification" => $this->faker->text(100),
            "size" => rand(26,42),
            "quantity" => rand(0,60),
            "price" => rand(40000,800000),
            "tax" => $this->faker->randomFloat(2,0.16,0.20),
        ];
    }
}
