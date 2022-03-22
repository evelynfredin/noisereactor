<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Genre;
use App\Models\Label;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class
        ]);

        $genres = Genre::factory(12)->create();
        Artist::factory(12)->hasAlbums(3)->create();
        Artist::all()->each(function ($artist) use ($genres) {
            $artist->genres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        Review::factory(4)->create();
    }
}
