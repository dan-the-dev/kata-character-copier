<?php

namespace Kata;

use PHPUnit\Framework\TestCase;
use Kata\Copier;

class CopierTest extends TestCase
{
    protected function setUp(): void
    {
        $this->copier = new Copier();
    }

    public function testShallPass(): void
    {
        $this->assertEquals(1, 1);
    }

    public function testHandleReturnTrue(): void
    {
        $this->assertEquals(true, $this->copier->handle());
    }
}
