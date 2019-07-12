<?php

declare(strict_types=1);

namespace Generators\Workers\Settings;

/**
 * @package Generators\Workers\Settings
 */
class ProducerWorkerSettings implements ProducerWorkerSettingsInterface
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
     * @var int
     */
    private $delay;

    /**
     * @param string $channel
     * @param int $delay
     * @param int $limit
     * @throws \Exception
     */
    public function __construct(
        string $channel,
        int $delay,
        int $limit
    ) {
        if ('' === $channel) {
            throw new \Exception('Empty channel');
        }
        if ($delay <=0) {
            throw new \Exception('delay invalid');
        }
        if ($limit <=0 || $limit > self::LIMIT_MAX) {
            throw new \Exception('Not valid limit');
        }

        $this->channel = $channel;
        $this->delay = $delay;
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
     * @return int
     */
    public function getDelay(): int
    {
        return $this->delay;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}
