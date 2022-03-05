<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;


test('shows login page')
    ->get('/')
    ->assertInertia(fn (Assert $page) => $page->component('Home'));
