<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasicRoutesTest extends TestCase
{
    /**
     * Test the home page loads successfully.
     */
    public function test_home_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Welcome to');
        $response->assertSee('Laravel 12');
        $response->assertSee('Bootstrap 5');
    }

    /**
     * Test user profile route with parameter.
     */
    public function test_user_profile_route(): void
    {
        $response = $this->get('/user/123');

        $response->assertStatus(200);
        $response->assertSee('User Profile');
        $response->assertSee('123');
    }

    /**
     * Test posts route with optional parameter.
     */
    public function test_posts_route_with_category(): void
    {
        $response = $this->get('/posts/technology');

        $response->assertStatus(200);
        $response->assertSee('Posts');
        $response->assertSee('technology');
    }

    /**
     * Test posts route without optional parameter.
     */
    public function test_posts_route_without_category(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee('Posts');
        $response->assertSee('general');
    }

    /**
     * Test example resource routes.
     */
    public function test_example_index_route(): void
    {
        $response = $this->get('/example');

        $response->assertStatus(200);
        $response->assertSee('Example Page');
    }

    /**
     * Test example create route.
     */
    public function test_example_create_route(): void
    {
        $response = $this->get('/example/create');

        $response->assertStatus(200);
        $response->assertSee('Create New Example');
    }

    /**
     * Test example show route.
     */
    public function test_example_show_route(): void
    {
        $response = $this->get('/example/1');

        $response->assertStatus(200);
        $response->assertSee('View Example #1');
    }

    /**
     * Test example edit route.
     */
    public function test_example_edit_route(): void
    {
        $response = $this->get('/example/1/edit');

        $response->assertStatus(200);
        $response->assertSee('Edit Example #1');
    }
}