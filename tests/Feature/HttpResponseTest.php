<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpResponseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    // unit testing for http response
    public function testPostResp()
    {
        $response = $this->json('POST','/testUser',["name"=>"Naresh"]);
        $response ->assertStatus(200)
                  ->assertJson(["created"=> true]);
    }

}
