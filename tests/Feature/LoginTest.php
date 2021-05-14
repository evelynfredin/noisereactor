<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = new User();
        $user->username = 'Dick Tracy';
        $user->email = 'dick@tracy.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->followingRedirects()->post('login', [
            'email' => 'dick@tracy.com',
            'password' => '123',
        ]);

        $response->assertSeeText('Welcome, Dick Tracy!');
    }

    public function test_login_user_no_pwd()
    {
        $response = $this->followingRedirects()->post('login', [
            'email' => 'dick@tracy.com',
        ]);

        $response->assertDontSeeText('Welcome, Dick Tracy!');
    }
}
