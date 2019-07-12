<?php

declare(strict_types=1);

namespace Generators\Workers\Settings;

/**
 * @package Generators\Workers\Settings
 */
interface ProducerWorkerSettingsInterface
{
    /**
     * @return string
     */
    public function getChannel(): string;

    /**
     * @return int
     */
    public function getDelay(): int;

    /**
     * @return int
     */
    public function getLimit(): int;
}
