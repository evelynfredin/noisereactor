<?php

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\post;

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
