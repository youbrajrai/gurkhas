<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAllRoutes()
    {
        $routes = \Illuminate\Support\Facades\Route::getRoutes();

        foreach ($routes as $route) {
            $response = $this->get($route->uri());
            $response->assertStatus(200);
        }
    }
}
