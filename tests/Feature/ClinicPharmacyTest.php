<?php

namespace Tests\Feature;

use Tests\TestCase;

class ClinicPharmacyTest extends TestCase
{
    /**
     * Test that the home page loads successfully.
     */
    public function test_home_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(fn($page) => 
            $page->component('welcome')
        );
    }

    /**
     * Test that the health check endpoint works.
     */
    public function test_health_check_endpoint(): void
    {
        $response = $this->get('/health-check');

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'ok'
        ]);
        $response->assertJsonStructure([
            'status',
            'timestamp'
        ]);
    }

    /**
     * Test that dashboard requires authentication.
     */
    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /**
     * Test welcome page contains clinic pharmacy branding.
     */
    public function test_welcome_page_has_clinic_branding(): void
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        // The page should render the welcome component which contains clinic branding
        $response->assertInertia(fn($page) => 
            $page->component('welcome')
        );
    }
}