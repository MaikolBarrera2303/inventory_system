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
            "specification" => $this->faker->text(60),
            "size" => rand(26,42),
            "quantity" => rand(0,100),
            "price" => rand(40000,1000000),
        ];
    }
}
