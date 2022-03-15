<?php

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\post;

it('renders the login page')
    ->get('/login')
    ->assertInertia(fn (Assert $page) => $page->component('Auth/Login'));

it('hides login page from authenticated user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/login')
        ->assertStatus(302);
});

it('displays errors when empty login details')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);
