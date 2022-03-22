<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(rand(1, 3), true),
            'edition' => 'Standard',
            'label_id' => Label::factory(),
            'description' => $this->faker->paragraph(mt_rand(4, 6)),
            'released_date' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
