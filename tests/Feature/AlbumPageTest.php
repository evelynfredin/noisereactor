<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders albums page', function () {
    $this
        ->get('/albums')
        ->assertInertia(fn (Assert $page) => $page->component('Site/Albums'));
});
