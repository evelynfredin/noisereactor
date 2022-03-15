<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\post;

it('renders the login page')
    ->get('/login')
    ->assertInertia(fn (Assert $page) => $page->component('Auth/Login'));

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

it('hides login page from authenticated user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/login')
        ->assertStatus(302);
});

it('displays errors when empty login details')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);
