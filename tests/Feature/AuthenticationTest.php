<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use function Pest\Laravel\post;

it('redirects user after login', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});

it('prevents user from login with incorrect password', function () {
    $user = User::factory()->create();

    post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
