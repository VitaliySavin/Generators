<?php

declare(strict_types=1);

namespace Generators\Workers\Settings;

use Generators\Config;

/**
  * @package Generators\Workers\Settings
 */
class Settings
{
    /**
     * @param string $type
     * @param string $limit
     * @param string $delay
     * @return ConsumerWorkerSettings|ProducerWorkerSettings
     * @throws \Exception
     */
    public static function create(
        string $type,
        string $limit = null,
        string $delay = null
    ) {
        if (Config::TYPE_CONSUMER_PRIME === $type) {
            return new ConsumerWorkerSettings(
                Config::WORKER_SETTINGS['prime']['channel'],
                Config::WORKER_SETTINGS['prime']['columnCounter'],
                !is_null($limit) ? (int) $limit : Config::WORKER_SETTINGS['prime']['limit']
            );
        } elseif (Config::TYPE_CONSUMER_FIBONACCI === $type) {
            return new ConsumerWorkerSettings(
                Config::WORKER_SETTINGS['fibonacci']['channel'],
                Config::WORKER_SETTINGS['fibonacci']['columnCounter'],
                !is_null($limit) ? (int) $limit : Config::WORKER_SETTINGS['fibonacci']['limit']
            );
        } elseif (Config::TYPE_PRODUCER_PRIME === $type) {
            return new ProducerWorkerSettings(
                Config::WORKER_SETTINGS['prime']['channel'],
                !is_null($delay) ? (int) $delay : Config::WORKER_SETTINGS['prime']['delay'],
                !is_null($limit) ? (int) $limit : Config::WORKER_SETTINGS['prime']['limit']
            );
        } elseif (Config::TYPE_PRODUCER_FIBONACCI === $type) {
            return new ProducerWorkerSettings(
                Config::WORKER_SETTINGS['fibonacci']['channel'],
                !is_null($delay) ? (int) $delay : Config::WORKER_SETTINGS['fibonacci']['delay'],
                !is_null($limit) ? (int) $limit : Config::WORKER_SETTINGS['fibonacci']['limit']
            );
        } else {
            throw new \Exception('type not allowed');
        }
    }
}
