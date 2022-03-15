<?php

use App\Models\User;
use function Pest\Laravel\post;
use Inertia\Testing\AssertableInertia as Assert;

it('renders the admin dashboard for logged in user', function () {
    $user = User::factory()->create();

    post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated()
        ->get('/admin')
        ->assertInertia(fn (Assert $page) => $page->component('Admin/Home'));
});
