<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Artist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateAlbumTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_album()
    {
        $user = new User();
        $user->username = 'Dick Tracy';
        $user->email = 'dick@tracy.com';
        $user->password = Hash::make('123');
        $user->save();

        $artist = new Artist();
        $artist->name = 'Punktallica';
        $artist->slug = 'Punktallica';
        $artist->bio = 'The punkiest of all';
        $artist->website = 'https://punk.com';
        $artist->save();

        $response = $this->actingAs($user)->post('new/album', [
            'name' => 'Greatest Tests',
            'edition' => 'Standard Edition',
            'description' => 'I am description of test',
            'artist_id' => $artist->id,
        ]);

        $this->assertDatabaseHas('albums', ['name'  => 'Greatest Tests']);
    }
}
