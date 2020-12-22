<?php

namespace Kata;

use PHPUnit\Framework\TestCase;
use Kata\Copier;

class CopierTest extends TestCase
{
    /** @var SourceInterface|MockObject */
    private $source;
    /** @var DestinationInterface|MockObject */
    private $destination;

    protected function setUp(): void
    {
        $this->source = $this->createStub(SourceInterface::class);
        $this->destination = $this->createMock(DestinationInterface::class);

        $this->copier = new Copier($this->source, $this->destination);
    }

    public function testHandleReturnTrue(): void
    {
        $this->source
        ->expects($this->exactly(4))
        ->method('getChar')
        ->will($this->onConsecutiveCalls('a', 'b', 'c', '\n'));

        $this->copier->copy();
    }
}
