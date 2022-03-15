<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders the home page')
    ->get('/')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Home'));
