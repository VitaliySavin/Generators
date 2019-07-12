<?php

declare(strict_types=1);

namespace Generators\Workers;

/**
 * @package Generators\Workers
 */
interface WorkerInterface
{
    /**
     * @param void
     */
    public function run(): void;
}
