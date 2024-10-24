<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodTag>
 */
class FoodTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array = ['pizza', 'kabab', 'peperoni', 'sushi'];
        $i = array_rand($array);
        return [
            'tag' => $array[$i]
        ];
    }
}
