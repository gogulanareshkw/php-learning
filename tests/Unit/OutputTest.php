<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{
    
    
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
//        print 'baz';          expecting 'foo', but printing 'baz', sooo failed
        print 'foo';            
}

    
}
