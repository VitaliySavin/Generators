<?php

declare(strict_types=1);

namespace Generators\Workers\Settings;

/**
 * @package Generators\Workers\Settings
 */
interface ConsumerWorkerSettingsInterface
{
    /**
     * @return string
     */
    public function getChannel(): string;

    /**
     * @return string
     */
    public function getColumnCounter(): string;

    /**
     * @return int
     */
    public function getLimit(): int;
}
