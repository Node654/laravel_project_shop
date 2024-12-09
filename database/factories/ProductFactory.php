<?php

namespace Database\Factories;

use App\Models\Brand;
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
            'title' => fake()->title(),
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
            'price' => fake()->numberBetween(),
            'thumbnail' => $this->faker->loremFlickr('products'),
        ];
    }
}
