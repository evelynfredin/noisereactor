<?php

use App\Models\Artist;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

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

it('can update artist when authenticated', function () {

    $artist = Artist::factory()->create();
    actingAs(User::factory()->create())
        ->followingRedirects()
        ->put(route('artist.update', $artist->first()), [
            'name' => 'Updated email name',
            'bio' => 'Updated email bio',
            'website' => 'https://noisereactor.test',
        ])
        ->assertValid();

    assertDatabaseHas('artists', [
        'name' => 'Updated email name',
    ]);
});

it('cant update artist when unauthenticated', function () {

    $artist = Artist::factory()->create();
    put(route('artist.update', $artist->first()), [
        'name' => 'Updated email name',
        'bio' => 'Updated email bio',
        'website' => 'https://noisereactor.test',
    ])
        ->assertStatus(302);
});

it('can delete artist when authenticated', function () {
    $user = User::factory()->create();
    $artist = Artist::factory(5)->create();

    actingAs($user)
        ->followingRedirects()
        ->delete(route('artist.destroy', 1));

    assertDatabaseMissing('artists', [
        'id' => 1
    ]);
});

it('can delete artist when unauthenticated', function () {

    Artist::factory(5)->create();
    delete(route('artist.destroy', 1))
        ->assertStatus(302);
});
