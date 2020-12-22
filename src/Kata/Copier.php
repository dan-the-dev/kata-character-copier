<?php

namespace Kata;

use Kata\CopierInterface;
use Kata\SourceInterface;
use Kata\DestinationInterface;

class Copier implements CopierInterface
{
    /** @var SourceInterface */
    private $source;
    /** @var DestinationInterface */
    private $destination;

    public function __construct(SourceInterface $source, DestinationInterface $destination)
    {
        $this->source = $source;
        $this->destination = $destination;
    }

    public function copy(): void
    {
        while ($char = $this->source->getChar()){
            if ($char === '\n') {
                break;
            }
        }
    }
}
