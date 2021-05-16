<?php

namespace Tests\Feature;

use App\Models\Album;
use Tests\TestCase;
use App\Models\User;
use App\Models\Artist;
use Illuminate\Support\Facades\Hash;

class AlbumTest extends TestCase
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

    public function test_update_album()
    {
        $user = new User();
        $user->username = 'DickTracy';
        $user->email = 'dick@racy.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->put('edit/album/' . 1, [
            'name' => 'Greatest Tests',
            'edition' => 'Deluxe',
            'description' => 'I am description of test',
            'artist_id' => 1,
        ]);

        $this->assertDatabaseHas('albums', ['edition' => 'Deluxe']);
    }

    public function test_delete_album()
    {
        $user = new User();
        $user->username = 'DTracy';
        $user->email = 'd@tracy.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->delete('delete/album/' . 1);

        $this->assertDatabaseMissing('albums', [
            'id' => 1
        ]);
    }
}
