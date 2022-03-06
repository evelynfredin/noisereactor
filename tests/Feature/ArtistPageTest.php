<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders artists page', function () {
    $this
        ->get('/artists')
        ->assertInertia(fn (Assert $page) => $page->component('Site/Artists'));
});
