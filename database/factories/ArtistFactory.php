<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(rand(1, 4), true),
            'bio' => $this->faker->sentence(4),
            'website' => $this->faker->url(),
            'slug' => $this->faker->unique()->word
        ];
    }
}
