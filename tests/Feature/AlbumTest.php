<?php

use App\Models\Artist;
use App\Models\Label;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\post;

it('renders albums page')
    ->get('/albums')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Albums'));

it('allows user to create an album', function () {

    actingAs(User::factory()->create())
        ->followingRedirects()
        ->post(route('album.store', [
            'title' => 'Pest Greatest Hits',
            'edition' => 'Standard',
            'description' => 'Lorem ipsum',
            'released_date' => '2022-03-20',
            'artist_id' => Artist::factory()->create(),
            'label_id' => Label::factory()->create()
        ]))
        ->assertStatus(200);

    assertDatabaseHas('albums', [
        'title' => 'Pest Greatest Hits'
    ]);
});

it('prevents unauthenticated user from creating an album', function () {
    post(route('album.store', [
        'title' => 'Pest Greatest Hits 2',
        'edition' => 'Standard',
        'description' => 'Lorem ipsum',
        'released_date' => '2022-03-20',
        'artist_id' => Artist::factory()->create(),
        'label_id' => Label::factory()->create()
    ]))
        ->assertStatus(302);

    assertDatabaseMissing('artists', [
        'title' => 'Pest Greatest Hits 2',
    ]);
});
