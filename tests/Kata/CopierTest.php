<?php

namespace Kata;

use PHPUnit\Framework\TestCase;
use Kata\Copier;
use Kata\SourceInterface;
use Kata\DestinationInterface;

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

    public function testStringAbc(): void
    {
        $this->source
        ->expects($this->exactly(4))
        ->method('getChar')
        ->will($this->onConsecutiveCalls('a', 'b', 'c', '\n'));

        $this->destination
        ->expects($this->exactly(3))
        ->method('setChar')
        ->with($this->logicalOr(
             $this->equalTo('a'),
             $this->equalTo('b'),
             $this->equalTo('c'),
        ));

        $this->copier->copy();
    }

    public function testStringDanielescillia(): void
    {
        $this->source
        ->expects($this->exactly(15))
        ->method('getChar')
        ->will($this->onConsecutiveCalls('d', 'a', 'n', 'i', 'e', 'l', 'e', 's', 'c', 'i', 'l', 'l', 'i', 'a', '\n'));

        $this->destination
        ->expects($this->exactly(14))
        ->method('setChar')
        ->with($this->logicalOr(
             $this->equalTo('d'),
             $this->equalTo('a'),
             $this->equalTo('n'),
             $this->equalTo('i'),
             $this->equalTo('e'),
             $this->equalTo('l'),
             $this->equalTo('e'),
             $this->equalTo('s'),
             $this->equalTo('c'),
             $this->equalTo('i'),
             $this->equalTo('l'),
             $this->equalTo('l'),
             $this->equalTo('i'),
             $this->equalTo('a'),
        ));

        $this->copier->copy();
    }
}
