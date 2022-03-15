<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders albums page')
    ->get('/albums')
    ->assertInertia(fn (Assert $page) => $page->component('Site/Albums'));
