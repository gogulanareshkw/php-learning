<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
//        dd($response);
//        $response->assertStatus(200);
        $response->assertSee('Welcome');
        //$response->assertSee('Laravel');
}
}
