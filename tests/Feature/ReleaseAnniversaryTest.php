<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders release anniversary page')
    ->get('/release-anniversary')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Anniversary'));
