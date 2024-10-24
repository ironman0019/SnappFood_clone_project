<?php

namespace Database\Factories;

use App\Models\FoodTag;
use App\Models\Resturent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resturent_id' => function() {
                return Resturent::factory()->create()->id;
            },
            'name' => fake()->word(),
            'material' => fake()->sentence(),
            'price' => fake()->randomDigit(),
            'tags' => function() {
                return FoodTag::factory()->create()->tag;
            }
        ];
    }
}
