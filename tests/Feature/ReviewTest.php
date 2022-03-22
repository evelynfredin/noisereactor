<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;
use App\Models\Review;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

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

it('can update review when authenticated', function () {
    Artist::factory(2)->hasAlbums(1)->create();
    Review::factory()->create([
        'excerpt' => 'Very bad excerpt',
        'content' => 'Lorem ipsum',
        'is_published' => true,
        'album_id' => 1
    ]);

    actingAs(User::factory()->create())
        ->followingRedirects()
        ->put(route('review.update', 1), [
            'excerpt' => 'Fool proof your app with Pest',
            'content' => 'Lorem ipsum',
            'is_published' => true,
            'album_id' => 1
        ])
        ->assertValid();

    assertDatabaseHas('reviews', [
        'excerpt' => 'Fool proof your app with Pest',
    ]);
});

it('protects review update route from unauthenticated', function () {
    Artist::factory(2)->hasAlbums(1)->create();
    Review::factory()->create([
        'excerpt' => 'Very bad excerpt',
        'content' => 'Lorem ipsum',
        'is_published' => true,
        'album_id' => 1
    ]);

    put(route('review.update', 1), [
        'excerpt' => 'Fool proof your app with Pest',
        'content' => 'Lorem ipsum',
        'is_published' => true,
        'album_id' => 1
    ])
        ->assertStatus(302);
});
