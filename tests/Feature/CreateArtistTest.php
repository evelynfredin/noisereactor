<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateArtistTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_artist()
    {
        $user = new User();
        $user->username = 'Dick Tracy';
        $user->email = 'dick@tracy.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->post('new/artist', [
            'name' => 'Punktallica',
            'bio' => 'The punkiest of all',
            'website' => 'https://punk.com'
        ]);

        $this->assertDatabaseHas('artists', ['bio'  => 'The punkiest of all']);
    }
}
