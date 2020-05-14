<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DBRecordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // unit testing for Database records
    // make sure your database and table details configured in phpunit.xml file
    public function testExample1()
    {
        // if the speccified name exist then only
        $this->assertDatabaseHas('users',[
            'name' => 'test'
        ]);
    }

    public function testExample2()
    {
        // if the speccified name not exist
        $this->assertDatabaseMissing('users',[
            'name' => 'noName'
        ]);
    }


}
