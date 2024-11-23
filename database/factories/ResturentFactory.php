<?php

namespace Database\Factories;

use App\Models\ResturentTag;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resturent>
 */
class ResturentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seller_id' => function() {
                return Seller::factory()->create()->id;
            },
            'name' => fake()->company(),
            'tag' => function() {
                return ResturentTag::factory()->create()->tag;
            },
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'bank' => fake()->creditCardNumber(),
            'delivary_price' => fake()->randomDigit(),
            'work_hours' => "12-23",
            'status' => 'open'
        ];
    }
}
