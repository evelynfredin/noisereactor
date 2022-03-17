<?php

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\post;
use function Pest\Laravel\get;

it('renders artists page')
    ->get('/artists')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Artists'));

it('allows user to create an artist', function () {

    actingAs(User::factory()->create())
        ->followingRedirects()
        ->post(route('artist.store', [
            'name' => 'Refactoring Hell',
            'bio' => 'We do not make new music, we refactor old songs to perfection',
            'website' => 'https://www.refactoring.com'
        ]))
        ->assertStatus(200);

    assertDatabaseHas('artists', [
        'name' => 'Refactoring Hell'
    ]);
});

it('prevents unauthenticated user from creating an artist', function () {
    post(route('artist.store', [
        'name' => 'Refactoring Hell',
        'bio' => 'We do not make new music, we refactor old songs to perfection',
        'website' => 'https://www.refactoring.com'
    ]))
        ->assertStatus(302);

    assertDatabaseMissing('artists', [
        'name' => 'Refactoring Hell'
    ]);
});

it('renders the artist page for authenticated user', function () {
    $user = User::factory()->create();

    post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated()
        ->get(route('artist.list'))
        ->assertInertia(fn (Assert $page) => $page->component('Admin/ArtistList'));
});

it('protects admin artist view from unauthenticated user', function () {
    get(route('artist.list'))
        ->assertStatus(302);
});
