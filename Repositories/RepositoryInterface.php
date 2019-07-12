<?php

declare(strict_types=1);

namespace Generators\Repositories;

/**
 * @package Generators\Repositories
 */
interface RepositoryInterface
{
    /**
     * @param string $columnCounter
     * @return int
     */
    public function getColumnCounterValue(string $columnCounter): int;

    /**
     * @param string $value
     * @param string $columnCounter
     * @return void
     */
    public function update(string $value, string $columnCounter): void;
}
