<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'album_id' => $this->faker->unique()->numberBetween(1, 6),
            'excerpt' => $this->faker->paragraph(mt_rand(2, 3)),
            'content' => $this->faker->paragraph(mt_rand(6, 8)),
            'is_published' => $this->faker->boolean($chanceOfGettingTrue = 40)
        ];
    }
}
