<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // unit testing for http requests and url
    public function testAboutRoute()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
    public function testServicesRoute()
    {
        $response = $this->get('/services');
        $response->assertStatus(200)
                 ->assertSee("Services");
    }
    public function testInvalidRoute()
    {
        $response = $this->get('/abcd');
        $response->assertStatus(404);
    }

}
