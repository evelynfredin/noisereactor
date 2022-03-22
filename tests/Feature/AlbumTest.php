<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;
use App\Models\User;
use Faker\Factory;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

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
});

it('renders the admins album page for authenticated user', function () {
    $user = User::factory()->create();

    post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated()
        ->get(route('album.list'))
        ->assertInertia(fn (Assert $page) => $page->component('Admin/AlbumList'));
});

it('protects admin album page from unauthenticated user', function () {
    get(route('album.list'))
        ->assertStatus(302);
});


it('can update album when authenticated', function () {
    Label::factory(6)->create();
    Artist::factory(1)->hasAlbums(3)->create();

    $chosenOne = Album::first();

    actingAs(User::factory()->create())
        ->followingRedirects()
        ->put(route('album.update', $chosenOne), [
            'title' => 'Pest Is Best',
            'edition' => 'Standard',
            'description' => 'Lorem ipsum',
            'released_date' => '2022-03-20',
            'label_id' => $chosenOne->label_id,
            'artist_id' => $chosenOne->artist_id
        ])
        ->assertValid();

    assertDatabaseHas('albums', [
        'title' => 'Pest Is Best',
    ]);
});

it('cant update album when unauthenticated', function () {
    Label::factory(6)->create();
    Artist::factory(1)->hasAlbums(3)->create();

    $chosenOne = Album::first();

    put(route('album.update', $chosenOne->first()), [
        'title' => 'Pest Is Best',
        'edition' => 'Standard',
        'description' => 'Lorem ipsum',
        'released_date' => '2022-03-20',
        'label_id' => $chosenOne->label_id,
        'artist_id' => $chosenOne->artist_id
    ])
        ->assertStatus(302);
});

it('can delete album when authenticated', function () {
    $user = User::factory()->create();
    Label::factory(6)->create();
    Artist::factory(3)->hasAlbums(2)->create();

    actingAs($user)
        ->followingRedirects()
        ->delete(route('album.destroy', Album::first()));

    assertDatabaseMissing('albums', [
        'id' => 1
    ]);
});

it('cant delete artist when unauthenticated', function () {
    Label::factory(6)->create();
    $albums = Artist::factory(3)->hasAlbums(2)->create();
    delete(route('album.destroy', $albums->first()))
        ->assertStatus(302);
});
