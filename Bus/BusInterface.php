<?php

declare(strict_types=1);

namespace Generators\Bus;

/**
 * @package Generators\Bus
 */
interface BusInterface
{
    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    public function push(string $key, string $value);

    /**
     * @param string $key
     * @return string|null
     */
    public function pop(string $key);
}
