<?php

declare(strict_types=1);

namespace Generators\Workers\Settings;

/**
 * @package Generators\Workers\Settings
 */
class ConsumerWorkerSettings implements ConsumerWorkerSettingsInterface
{
    private const LIMIT_MAX = 10000;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $columnCounter;

    /**
     * @param string $channel
     * @param string $columnCounter
     * @param int $limit
     * @throws \Exception
     */
    public function __construct(
        string $channel,
        string $columnCounter,
        int $limit
    ) {
        if ('' === $channel) {
            throw new \Exception('Empty channel');
        }
        if ('' === $columnCounter) {
            throw new \Exception('Empty columnCounter');
        }
        if ($limit <=0 || $limit > self::LIMIT_MAX) {
            throw new \Exception('Not valid limit');
        }

        $this->channel = $channel;
        $this->columnCounter = $columnCounter;
        $this->limit = $limit;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getColumnCounter(): string
    {
        return $this->columnCounter;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}
