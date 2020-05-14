<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCompare()
    {
        $a="111";
        $b="111";
        $this->assertSame($a,$b);   //it fails if different


        // it fails because 1 is not equals to '1' and 3 is not equals to 33
        // $this->assertEquals(
        //     [1, 2, 3, 4, 5, 6],
        //     ['1', 2, 33, 4, 5, 6]
        // );

    }

    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }






}
