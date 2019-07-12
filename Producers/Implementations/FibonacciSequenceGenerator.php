<?php

declare(strict_types=1);

namespace Generators\Producers\Implementations;

use Generators\Producers\ProducerInterface;

/**
 * @package Generators\Producers\Implementations
 */
class FibonacciSequenceGenerator implements ProducerInterface
{
    /**
     * @return \Traversable
     */
    public function build(): \Traversable
    {
        $i = '0';
        yield $i;
        $k = '1';
        yield $k;
        while (true) {
            $k = bcadd((string)$i, (string)$k);
            $i = bcsub((string)$k, (string)$i);
            yield $k;
        }
    }
}
