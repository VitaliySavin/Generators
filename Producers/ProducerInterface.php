<?php

declare(strict_types=1);

namespace Generators\Producers;

/**
 * @package Generators\Producers
 */
interface ProducerInterface
{
    /**
     * @return \Traversable
     */
    public function build(): \Traversable;
}
