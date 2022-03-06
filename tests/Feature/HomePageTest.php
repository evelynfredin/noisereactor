<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders the home page', function () {
    $this
        ->get('/')
        ->assertInertia(fn (Assert $page) => $page->component('Site/Home'));
});
