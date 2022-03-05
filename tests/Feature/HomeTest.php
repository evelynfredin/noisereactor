<?php

use Inertia\Testing\AssertableInertia as Assert;

it('shows home page')
    ->get('/')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Home'));
