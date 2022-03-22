<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('renders reviews page')
    ->get('/reviews')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Reviews'));

it('renders the create review form for auth user', function () {
    $user = User::factory()->create();
    $album = Album::factory()->create([
        'title' => 'Pest Greatest Hits',
        'edition' => 'Standard',
        'description' => 'Lorem ipsum',
        'released_date' => '2022-03-22',
        'artist_id' => Artist::factory()->create(),
        'label_id' => Label::factory()->create()
    ]);

    actingAs($user)
        ->get('/admin/review/' . $album->id)
        ->assertInertia(fn (Assert $page) => $page->component('Admin/CreateReview'));
});

it('protects the create review form for unauth user', function () {
    $album = Album::factory()->create([
        'title' => 'Pest Greatest Hits',
        'edition' => 'Standard',
        'description' => 'Lorem ipsum',
        'released_date' => '2022-03-22',
        'artist_id' => Artist::factory()->create(),
        'label_id' => Label::factory()->create()
    ]);

    get('/admin/review/' . $album->id)
        ->assertStatus(302);
});

it('allows auth user to add review', function () {
    $user = User::factory()->create();
    $album = Album::factory()->create([
        'title' => 'Pest Greatest Hits',
        'edition' => 'Standard',
        'description' => 'Lorem ipsum',
        'released_date' => '2022-03-22',
        'artist_id' => Artist::factory()->create(),
        'label_id' => Label::factory()->create()
    ]);

    actingAs($user)
        ->post(route('review.store', $album->id), [
            'excerpt' => 'This is the excerpt',
            'content' => 'This is the content',
            'is_published' => true,
            'album_id' => $album->id
        ])
        ->assertValid();

    assertDatabaseHas('reviews', [
        'excerpt' => 'This is the excerpt',
    ]);
});

it('protects the review store route for unauth user', function () {
    $album = Album::factory()->create([
        'title' => 'Pest Greatest Hits',
        'edition' => 'Standard',
        'description' => 'Lorem ipsum',
        'released_date' => '2022-03-22',
        'artist_id' => Artist::factory()->create(),
        'label_id' => Label::factory()->create()
    ]);

    post(route('review.store', $album->id), [
        'excerpt' => 'This is the excerpt',
        'content' => 'This is the content',
        'is_published' => true,
        'album_id' => $album->id
    ])
        ->assertStatus(302);
});
