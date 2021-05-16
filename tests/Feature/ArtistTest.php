<?php

namespace Tests\Feature;

use App\Models\Artist;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ArtistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_artist()
    {
        $user = new User();
        $user->username = 'Bruce Wayne';
        $user->email = 'bruce@wayne.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->post('new/artist', [
            'name' => 'Punktallica',
            'bio' => 'The punkiest of all',
            'website' => 'https://punk.com'
        ]);

        $this->assertDatabaseHas('artists', [
            'bio'  => 'The punkiest of all'
        ]);
    }

    public function test_update_artist()
    {
        $user = new User();
        $user->username = 'Sherlock';
        $user->email = 's@holmes.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->put('edit/artist/' . 1, [
            'name' => 'Megaderp',
            'bio' => 'Dave\s plan B',
            'website' => 'https://punk.com',
            'slug' => 'punktallica'
        ]);

        $this->assertDatabaseHas('artists', [
            'bio' => 'Dave\s plan B'
        ]);
    }

    public function test_delete_artist()
    {
        $user = new User();
        $user->username = 'Detective';
        $user->email = 'abc@detectives.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->delete('delete/artist/' . 1);

        $this->assertDatabaseMissing('artists', [
            'name' => 'Megaderp'
        ]);
    }
}
