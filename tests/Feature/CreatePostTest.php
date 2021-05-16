<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_post()
    {
        $user = new User();
        $user->username = 'Dick Tracy';
        $user->email = 'dick@tracy.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->post('new/post', [
            'title' => 'To be or not to be',
            'excerpt' => 'That is not the question',
            'body' => 'Then what is the question?',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'To be or not to be'
        ]);
    }
}
