<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all_routes()
    {
        $routes = [
            '/',
            '/login',
            '/albums',
            '/artists',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            if ($response->assertStatus(200)) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }
    }
}
