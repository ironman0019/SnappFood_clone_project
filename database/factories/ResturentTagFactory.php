<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResturentTag>
 */
class ResturentTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array = ['Fast Food', 'Kabab', 'Persian'];
        $i = array_rand($array);
        return [
            'tag' => $array[$i]
        ];
    }
}
