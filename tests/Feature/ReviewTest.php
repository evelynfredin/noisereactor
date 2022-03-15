<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders reviews page')
    ->get('/reviews')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Reviews'));
