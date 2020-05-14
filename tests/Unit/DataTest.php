<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],          // 0+0 = 0 pass
            [0, 1, 1],          // 0+1 = 1 pass
            [1, 0, 1],          // 1+0 = 1 pass
//          [1, 1, 3]           // 1+1 = 2 but mentioned 3, sooo failed, to make it pass replace 3 with 2
        ];
    }

}
