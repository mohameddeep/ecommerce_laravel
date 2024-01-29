<?php

namespace Database\Factories;

use App\Models\Catogry;
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
    public function definition()
    {
        return [
            "name"=>fake()->name(),
            "description"=>fake()->text(),
            "price"=>fake()->numberBetween(100,800),
            "discount"=>fake()->numberBetween(20,50),
            "quantity"=>fake()->numberBetween(1,10),
            "image"=>fake()->imageUrl(),
            "catogry_id"=>Catogry::inRandomOrder()->first()?->id
        ];

    }
}
